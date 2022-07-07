<?php 
namespace App\Services\Incident;

use App\Models\Trigger;
use App\Models\Reason;
use App\Models\IncidentActivity;
use App\Models\InvestigationActivity;
use App\Models\Incident;
use App\Models\ActivitySelected;
use App\Models\SelectedResults;
use App\Services\Incident\ReasonService;
use App\Http\Resources\IncidentActivityResource;
use App\Http\Resources\Incident\ActivityResource;
use App\Models\InvestigationActivityResults;
use App\Models\ActivityRecommendation;

use Response;

class ActivityService {

	private $trigger;
	private $activity;

	public function __construct() {
		$this->trigger = new Trigger;
		$this->activity = new InvestigationActivity;
	}

	public function index() {
		return Response::json($this->activity->with(['result', 'response'])->get());
	}

	/**
	 * *************************************************************************
	 * GET INCIDENT 
	 * *************************************************************************
	 * @return [type] [description]
	 */
	public function _get_incident_activities() {
		return (new IncidentActivity)->get();
	}

	/**
	 * ****************************************************************************************
	 * Select Action or Activity 
	 * ****************************************************************************************
	 * @param array $array [description]
	 * ****************************************************************************************
	 */
	public function SaveSelectActivity(array $array) {

		$activity = new ActivitySelected;
		$activity->incident_id = (new Incident)->where( 'iuid', '=', $array['incident_id'])->first()->id;
		$activity->activity_id =  $array['activity_id'];
		$activity->activity = $array['activity'];
		$activity->save();	

		if ( $activity->save() ) {
			return true;
		}

		return false;
	}
    

	/**
	 * this function save activity results
	 * @param  array  $array [description]
	 * @return [type]        [description]
	 */
    public function saveResult( array $array ) {

  		$selectResult = new SelectedResults;
  		$selectResult->incident_id = (new Incident)->where('iuid','=',$array['incident_id'])->first()->id;
  		$selectResult->activity_id = $array['activity_id'];
  		$selectResult->result_id = (new InvestigationActivityResults )->where('result', '=', $array['result'])->first()->id;
  		$selectResult->result = $array['result'];
  		$selectResult->datetime = $array['datetime'];
  		$selectResult->comment = $array['comment'];
  		$selectResult->save();

  		if ( $selectResult->save()) {
  			return true;
  		}
  		return false;
    }


	/**
	 * **********************************************************
	 * THIS FUNCTION SAVE ACTIVITY RESULTS
	 * **********************************************************
	 * @param  array  $array [description]
	 * @return [type]        [description]
	 */
	public function saveActivityResult( array $array ) {
		
		$save = new InvestigationActivityResults;
		$save->activity_id = $array['activity_id'];
		$save->result = $array['result'];
		// $save->description = $array['description'];
		$save->save();

		if ( $save->save()) {
			return true;
		}
		return false;
	}
	
	/**
	 * ********************************************************************************
	 * [get_activity_by_id description]
	 * ********************************************************************************
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function get_activity_by_id($id) {
		return new ActivityResource($this->activity->where('id', '=', $id)->first());
	}

	/**
	 * *************************************************************************************************************
	 * [_save_selected_activity description]
	 * *************************************************************************************************************
	 * @param  array  $array [description]
	 * @return [type]        [description]
	 * *************************************************************************************************************
	 */
	public function _save_selected_activity( array $array) {
		$save_selected_activity = new ActivitySelected;
		return $save_selected_activity->create($array);
	}

	/**
	 * ************************************************************************************************************
	 * this function store incident activity results
	 * ************************************************************************************************************
	 * @param  array  $array [description]
	 * @return [type]        [description]
	 */
	public function store_activity_results( array $array) {
		
		$result = new InvestigationActivityResults;
		$store_result = $result->create($result);

		if ( $store_result ) {
			return [ 'status' => true ];
		}

		return ['status' => false ];
	}

	/**
	 * ***********************************************************************************************************
	 * THIS FUNCTION
	 * ***********************************************************************************************************
	 * @param  [type] $reason [description]
	 * @return [type]         [description]
	 */
	public function get_activities_by_reason_response($reason) {

		$reason_id = (new Reason)->where('reason', '=', $reason)->first()->id;
		$trigger = $this->trigger->where('reason_id', '=', $reason_id)->where('trigger_type_id', '=', 1)->first();

		if ($trigger) {
			return $this->activity->get();
		}
	}
	/**
	 * ********************************************************************************
	 * THIS 
	 * ********************************************************************************
	 * @param  [type] $incident_id [description]
	 * @return [type]              [description]
	 */
	public function get_incident_activities($incident_id) { 
		
		$activities = incidentActivity::where('incident_id', '=', $incident_id)->get();
		return IncidentActivityResource::collection($activities);
	}

	/**
	 * 
	 * [store_incident_activity description]
	 * 
	 * @param  array  $array [description]
	 * @return [type]        [description]
	 */
	public function store_incident_activity(array $array) {

		$incidentActivity = new IncidentActivity;
		$incidentActivity->incident_id = (new Incident)->where('iuid', '=', $array['incident_id'])->first()->id;
		$incidentActivity->activity_id = $array['activity_id'];
		$incidentActivity->datetime = $array['datetime'];
		$incidentActivity->save();

		if ($incidentActivity->save()){
			return [
				'status' => true,
				'message' => 'Incident Save Successfully'
			];
		}
	}


	public function getRecommendation() {}


	public function storeRecommendation(Request $reques) {
		$attributes = $request->all();
		return (new ActivityRecommendation)->store_recommendation($array);
	}

}

?>	