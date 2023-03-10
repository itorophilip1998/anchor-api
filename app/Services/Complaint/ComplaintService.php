<?php     
namespace App\Services\Complaint;


use App\Models\Complaint;
use App\Models\ClientComplaint;

use App\Services\Complaint\ActionService;

use App\Http\Resources\Complaint\ComplaintResource;
use App\Http\Resources\Complaint\ComplaintCollection;use App\Models\ComplaintInvestigationResponse;
use App\Models\ComplaintActionResponse;
use App\Models\AssignComplaintNurse;

use sirajcse\UniqueIdGenerator\UniqueIdGenerator;
use Carbon\Carbon;
use Auth;

class ComplaintService {

	private $complaint;

	public function __construct(Complaint $complaint) {
		$this->complaint = $complaint;
	}

	/**
	 * GET ALL COMPLAINTS USEING LARAVEL COLLECTION
	 * TODO: ADD PAGINATION
	 * @return [type] [description]
	 */
	public function index() {
		return new ComplaintCollection($this->complaint->orderBy('id', 'desc')->get());
	}

	/**
	 * This function create user complaint
	 * @param  array  $array [description]
	 * @return [type]        [description]
	 */
	public function store( array $array) {
		
		$id = UniqueIdGenerator::generate(['table' => 'complaints', 'length' => 10]);
	
		$complaint = new Complaint;
		$complaint->status = 'New';	
		$complaint->cuid = 'Com-'.$id ;
		$complaint->date_reported = Carbon::parse( $array['dateReported'])->format('Y/m/d');
		$complaint->isRoutineServiceIssue = $array['isRoutingServiceIssue'];
		$complaint->occurrence_date = Carbon::parse(  $array['dateOfOccurrence'])->format('Y/m/d');
		$complaint->report_timeline = $array['mandated_report_timeline'];
		$complaint->reported_by = $array['reported_by'];
		$complaint->client_relationship = $array['client_relationship'];
		$complaint->isSelfDirecting = $array['selfDirecting'];
		$complaint->cluster = $array['isCluster'];
		$complaint->complaint_hours = $array['hoursOfComplaint'];
		$complaint->complaint_category_id = $array['category'];
		$complaint->complaint_type_id = $array['complaintType'];
		$complaint->complaint_time =Carbon::parse(  $array['timeOfComplaint'])->format(' H:i:s');
		$complaint->description = $array['complaintDescription']; 
		$complaint->added_by = Auth::user()->uuid;
		$complaint->save();

		if ($complaint->save() ) {
			$addClient = $this->addClientToCompliant($complaint->id, $array['client']);
			return ['created' => true, 'complaint_id' => $complaint->id ];
		}

		return ['created' => true ];
	}

	public function delete($id) {

		$complaint = Complaint::find($id);

		$complaint->delete();

		return array('success' => true, 'message' => 'Complaint deleted successfully');
	}

	/**
	 * **********************************************************************************
	 * THIS FUNCTION ADD CLIENTS TO A COMPLIANT
	 * **********************************************************************************
	 * @param [type] $compliant_id [description]
	 * @param array  $clients      [description]
	 */
	public function addClientToCompliant($complaint_id, $client ) {

		$complaint = new ClientComplaint;
		$complaint->client_id = $client;
		$complaint->complaint_id = $complaint_id;
		$complaint->save();

		if ( $complaint->save()) {
			return ['created' => true];
		}
	}

	/**
	 * ***********************************************************************************
	 * This service get complaint details
	 * ***********************************************************************************
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function details( $id ) {

		$complaintObj = Complaint::where('id', '=', $id)->first(); 

		 $complaintId = $complaintObj->id;
		 $complaintDetails = $this->complaint->where('id', '=', $complaintId)->first();

		 return new ComplaintResource($complaintDetails);
	}

	/**
	 * THIS FUNCTION SAVE THE RESPONSE OF EACH ACTION
	 * @param  array  $array [description]
	 * @return [type]        [description]
	 */
	public function saveActionResponse(array $array) {

		 $response = new ComplaintActionResponse;
		 $response->complaint_id = $array['complaint_id'];
		 $response->action_id = (new ActionService)->getActionIdByAction($array['action']);
		 $response->action_answer_id = (new ActionService)->getActionAnswerbyAnswer($array['action_answer']);
		 $response->action = $array['action'];
		 $response->response = $array['action_answer'];
		 $response->added_by = Auth::user()->id;
		 $response->save();

		 if ( $response->save()) {
		 	return ['created' => true];
		 }
		 #r
	}

	public function saveComplaintResponse( array $array) {

		// $response = new ComplaintInvestigationResponse;
		// $response->investigation_id = $array['investigation'];
		// $response->investigation_answer_id = $array['investigation_answer'];
		// $response->response = $array['investigation_answer'];
		// $response->investigation = $array['investigation'];
		// $response->comment = $array['comment'];
		// $response->save();
  
		// if ( $response->save()) {
		// 	return ['created' => true];
		// }
	}

	public function assignNurseToComplaints(array $array) {

		$complaint_id = $array['complaint_id'];
		$complaint = Complaint::find( $complaint_id );
		if ( $array['action'] == 'Nurse Visit') {
		  $complaint->isNurseVisit  = true;
		}
		if ( $array['action'] == 'File Review') {
		  $complaint->isFileReviewed= true;
		}
		$complaint->save();

		if ( $complaint->save()) {

			if ($assign = AssignComplaintNurse::where('complaint_id', '=', $array['complaint_id'])
			->where('user_id', '=', $array['user_id'])->exists()) {
				return $this->updateNurseAssignment($array);
			}
			return $this->assignNurse($array);
		}
	}

	/**
	 * THIS FUNCTION ASSIGN A NURSE TO A COMPAINT
	 * @param  [type] $complait_id [description]
	 * @param  [type] $nurse_id    [description]
	 * @return [type]              [description]
	 */
	public function assignNurse(array $array) {

		$assign = new AssignComplaintNurse;
		$assign->complaint_id = $array['complaint_id'];
		$assign->user_id = $array['user_id'];

		if ( $array['action'] == 'Nurse Visit') {
			$assign->nurse_visit = 1;
		}
		if ( $array['action'] == 'File Review') {
			$assign->file_review = 1;
		}

		$assign->save();

		if ( $assign->save()) {
			return ['created' => true ];
		}

		return ['created' => false];
	}

	/**
	 * THIS FUNCTION NURSE ASSIGNMENT
	 * @param  array  $array [description]
	 * @return [type]        [description]
	 */
	public function  updateNurseAssignment( array $array) {
		
		$assign = AssignComplaintNurse::where('complaint_id', '=', $array['complaint_id'])
		->where('user_id', '=', $array['user_id'])->first();

		if ( $array['action'] == 'Nurse Visit') {
			$assign->nurse_visit = true;
		}

		if ( $array['action'] == 'File Review') {
			$assign->file_review = true;
		}
		
		$assign->update();

		if ( $assign->update() ) {
			return ['upated' => true];
		}

		return ['updated' => false];
	}

	/**
	 * [storeThirdPartyInvestigation description]
	 * @param  array  $array [description]
	 * @return [type]        [description]
	 */
	public function storeThirdPartyInvestigation( array $array) {

		
	} 

}
 ?>