<?php 
namespace App\Repositories;

use App\Interfaces\IncidentRepositoryInterface;
use sirajcse\UniqueIdGenerator\UniqueIdGenerator;
use App\Models\incidentType;
use App\Services\Incident\ReasonService;
use App\Models\IncidentTypeCategory;
use App\Http\Resources\IncidentResource;
use App\Http\Resources\IncidentTypeResource;
use App\Models\Incident;
use Carbon\Carbon;
use Response;
use Auth;

class IncidentRepository implements IncidentRepositoryInterface {

	private $incident;

	public function __construct(){
		$this->incident = new incident;
	}

	/**
	 * [get_incident_details description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function get_incident_details( $id ) {

		$response = $this->incident->where('iuid', '=', $id)->first();
		return new IncidentResource($response);
	}
	/**
	 * [getIncidents description]
	 * @param  array  $params [description]
	 * @return [type]         [description]
	 */
	public function getIncidents(array $params) {

		$response = $this->incident;
		return IncidentResource::collection($response->get());
	}

	/**
	 * [getIncidentTypes description]
	 * @return [type] [description]
	 */
	public function getIncidentTypes() {
		$types = new IncidentTypeCategory;
		return IncidentTypeResource::collection($types->get());
	}

	/**
	 * this is the function creates a incident
	 * @param  array  $incident [description]
	 * @return [type]           [description]
	 */
	public function create_incident( array $array) {

		$incident = new incident;

		$id = UniqueIdGenerator::generate(['table' => 'incidents', 'length' => 10]);
        $new_id = "INC-".$id;

		$incident->iuid = $new_id;
		$incident->status = 1;
		$incident->client_id = $array['client'];
		$incident->date = Carbon::parse( $array['incident_date'])->format('Y/m/d');
		$incident->timeline = $array['incident_report_timeline'];
		$incident->time = Carbon::parse($array['incident_time'])->format('00:00:00');
		$incident->added_by = Auth::user()->id;
		$incident->client_relation = $array['client_relationship'];
		$incident->hours_of_incident = $array['hours_of_incident'];
		$incident->incident_level = $array['priority'];
		$incident->coord_involved = $array['coord'];
		$incident->nurse_involved = $array['assign_nurse'];
		$incident->incident_type_category_id = $array['incident_type_category_id'];
		$incident->incident_type = $array['incident_type'];
		$incident->resolution_timeline = $array['resolution_timeline'];
		$incident->isInsurance = $array['is_insurance'];
		$incident->save();

		if ( $incident->save() ) {

			$incidentReason = (new ReasonService)->save_reasons_for_incident($incident->id, $array['incident_reason_id']);

			return [
				'status' => true,
				'reason_save' => $incidentReason,
				'message' => 'Incident Successfully added',
				'incident_id' => $incident->iuid
			];
		}

		return [
			'status' => false,
			'message' => "Something went wrong while trying create a new incident"
		];
	}
}

?>