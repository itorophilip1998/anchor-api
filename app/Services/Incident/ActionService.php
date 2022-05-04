<?php 
namespace App\Services\Incident;

use App\Models\ClinicianRecommendation;
use App\Models\IncidentAction;
use App\Models\InvestigationActivity;
use App\Models\ActionResult;
use App\Models\Action;


use Response;

class ActionService {


	public function index () {}

	public function store_incident_action(array $array ) {

		$create = IncidentAction::create($array);
		return $create->id;
	}

	/**
	 * ---------------------------------------------------------------
	 * THIS FUNCTION STORE THE RESULTS OF ACTION
	 * ---------------------------------------------------------------
	 * @param  [type] $action_id [description]
	 * @param  [type] $result    [description]
	 * @return [type]            [description]
	 */
	public function store_result( $action_id, $result ){

		$actionResult = new ActionResult;
		$actionResult->action_id = $action_id;
		$actionResult->result = $result;
		$actionResult->save();

		if ( $actionResult->save() ) {
			return true;
		}
		return false;
	}

	/**
	 * -----------------------------------------------------------------
	 * THIS FUNCTION INITIALLY JUST TRIGGER DEFAUL ACTION RESULT
	 * -----------------------------------------------------------------
	 * @param  [INTEGER] $incident_id [INCIDENT ID ]
	 * @return [type]              [description]
	 */
	public function trigger_default_action_results( $incident_id ) {

		$activities =  InvestigationActivity::get();
		foreach ($activities as $activity) {
			
			$params = ['incident_id'=> $incident_id, 'action' => $activity->activity ];
			$incident_action_id = $this->store_incident_action ( $params );
             $this->trigger_result($incident_action_id);
		}

		return response()->noContent();
	}

	/**
	 * --------------------------------------------------------------------
	 * THIS FUNCTION RANDOM THE DEFAULT RESULTS
	 * --------------------------------------------------------------------
	 * @param  [type] $action_id [description]
	 * @return [type]            [description]
	 */
	public function trigger_result( $action_id ) {

		$results = Action::inRandomOrder()->limit(3)->get();
		foreach( $results as $result ) {
			$this->store_result($action_id, $result->name );
		}
		
		return response()->noContent();
	}

	public function get_all_actions() {
		return Response::json(Action::all());
	}


	public function action_recommendations() {
		return Response::json(ClinicianRecommendation::all());
	}
}
 ?>
