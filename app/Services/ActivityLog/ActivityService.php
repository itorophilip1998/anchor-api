<?php 
namespace App\Services\ActivityLog;

use Spatie\Activitylog\Models\Activity;
use Response;

class ActivityService {

	private $activity;

	public function __construct(Activity $activity) {
		$this->activity = $activity;
	}

	public function getAllActivtiy() {
		return Response::json($this->activity::all());
	}

	public function getActivityByComponent() {}

	public function getUserActivty($userId) {}

	public function getActivityByIncident($incidentId) {}

	public function getActivityComplaintId($complaintId) {}

	public function getAcitivtyByTaskiId($taskId) {}


	/**
	 * THIS FUNCTION STORE THE ACTIVITY LOG FOR EACH MODULE AND USER
	 * @param  array  $array [description]
	 * @return [type]        [description]
	 */
	public function storeActivity(array $array) {

		$activity = $this->activity()->performedOn( $array['model'] )->causedBy($array['user']);

		if ($array['incident_id']) {

			$activity = $activity->withProperties(['incident_id' => $array['incident_id']]);

		}

		return $activity->log($array['message']);
	}
}
?>