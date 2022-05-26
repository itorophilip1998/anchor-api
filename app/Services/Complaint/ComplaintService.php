<?php     
namespace App\Services\Complaint;


use App\Models\Complaint;
use App\Models\ClientComplaint;

use App\Http\Resources\Complaint\ComplaintResource;
use App\Http\Resources\Complaint\ComplaintCollection;

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
		return new ComplaintCollection($this->complaint->all());
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
		$complaint->added_by = Auth::user()->id;
		$complaint->save();

		if ($complaint->save() ) {
			$addClient = $this->addClientToCompliant($complaint->id, $array['client']);
			return ['created' => true, 'complaint_id' => $complaint->id ];
		}

		return ['created' => true ];
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
		 $complaintId = Complaint::where('id', '=', $id)->first()->id;
		 $complaintDetails = $this->complaint->where('id', '=', $complaintId)->first();

		 return new ComplaintResource($complaintDetails);
	}


}

 ?>