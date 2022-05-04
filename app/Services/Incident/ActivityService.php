<?php 
namespace App\Services\Incident;

use App\Models\Trigger;
use App\Models\Reason;
use App\Models\IncidentActivity;
use App\Models\InvestigationActivity;
use App\Models\Incident;
use App\Services\Incident\ReasonService;
use App\Http\Resources\IncidentActivityResource;
use Response;

class ActivityService {

	private $trigger;
	private $activity;

	public function __construct() {

		$this->trigger = new Trigger;
		$this->activity = new InvestigationActivity;
	}
	/**
	 * this function get acitivies
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

	public function get_incident_activities($incident_id) { 
		$activities = incidentActivity::where('incident_id', '=', $incident_id)->get();
		return IncidentActivityResource::collection($activities);
	}

	/**
	 * [store_incident_activity description]
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


}

?>	