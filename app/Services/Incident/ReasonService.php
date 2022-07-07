<?php  
namespace App\Services\Incident;

/* Services */
use App\Services\Incident\ActionService;

/* Modles */
use App\Models\InvestigationResponse;
use App\Models\IncidentReason;
use App\Models\Incident;
use App\Models\Trigger;
use App\Models\Reason;

use Response;


class ReasonService {

	private $reason;

	public function __construct() {
		$this->reason = new Reason;
	}

	/**
	 * [get_reason_by_incident_id description]
	 * @param  [type] $incident_type_id [description]
	 * @return [type]                   [description]
	 */
	public function get_reason_by_incident_id($incident_type_id) {

		$response =  $this->reason->where('reason_category_id', '=', $incident_type_id)->get();
		return Response::json($response);
	}

	/**
	 * this function check if reason already exist not suppose to have more than one reason
	 * @return [type] [description]
	 */
	public function save_reasons(array $array) {

		$incident_id = $this->get_incident_id($array['incident_id']);
		$incident_reason = IncidentReason::where('incident_id', '=', $incident_id)->count();
		
		if ($incident_reason > 0) {
			return $this->update_reason_response($array);
		}

		return $this->store_reason_response($array);
	}

	/**
	 * this function save incident reason by ids
	 * @param  [type] $indient_id [description]
	 * @param  [type] $reason_id  [description]
	 * @return [type]             [description]
	 */
	public function save_reasons_for_incident($incident_id, $reason_id) {

		$incident_reason = new IncidentReason;
		$incident_reason->incident_id = $incident_id;
		$incident_reason->reason = $this->reason->find($reason_id)->reason;
		$incident_reason->save();

		if ( $incident_reason->save() ) {
			$this->check_reason_has_action( $reason_id, $incident_id);
			return true;
		}

		return false;
	}

	/**
	 * THis function actually store the incident reason that is selected by the user
	 * @param  array  $array [description]
	 * @return [type]        [description]
	 */
	public function store_reason_response( array $array) {

		$incident_reason = new IncidentReason;
		$incident_reason->incident_id = $this->get_incident_id($array['incident_id']);
		$incident_reason->reason = $array['reason'];
		$incident_reason->save();

		if ( $incident_reason->save() ){
			return response()->noContent();
		}
	}

	public function update_reason_response($array) {

		$update = IncidentReason::where('incident_id', '=', $this->get_incident_id($array['incident_id']))->first();
		$update->reason = $array['reason'];
		$update->save();

		if ( $update->save() ) {
			return response()->noContent();
		}
	}

	/**
	 * This function save investigation question
	 * @param  array  $array [description]
	 * @return [type]        [description]
	 */
	public function save_investigation( array $array ) {

		$responses = $array['response'];
		
		foreach ( $responses as $key => $value ) {
			$investigationResponse = new InvestigationResponse;
			$investigationResponse->incident_id = $this->get_incident_id($array['incident_id']);
			$investigationResponse->investigation_question_id = $key;
			$investigationResponse->response = $value;
			$investigationResponse->save();
		}

		return response()->noContent();
	}

	public function get_reason_category($reason) {
		return (new Reason)->where('reason', '=', $reason)->first()->reason_category_id;	
	}
    
    // Incident Service
	public function get_incident_id( $iuid ) {
		return (new Incident)->where('iuid', '=', $iuid)->first()->id;
	}

	/**
	 * -----------------------------------------------------------------------------------------------------------
	 * this function check for triggers
	 * -----------------------------------------------------------------------------------------------------------
	 * @param  [type] $reason_id [description]
	 * @return [type]            [description]
	 */
	public function check_reason_has_action ($reason_id, $incident_id) {
		if ((new Trigger)->where('reason_id', '=', $reason_id)->where('trigger_type_id', '=', 1)->first()) {
               (new ActionService)->trigger_default_action_results( $incident_id );
               return true;
		}

	 	return false;
	}
}



