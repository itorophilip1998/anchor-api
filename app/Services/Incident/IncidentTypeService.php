<?php 
namespace App\Services\Incident;

use App\Models\IncidentType;
use App\MOdels\IncidentTypeCategory;

use Response;

class IncidentTypeService {

	private $incidentType;

	public function __construct() {
		$this->IncidentType = new IncidentType;
	}

	/**
	 * *************************************************
	 * This function creates a new Incident type
	 * **************************************************
	 * @param  array  $array [description]
	 * @return [type]        [description]
	 */
	public function createIncidentType( array $array) {

		$incidentType = IncidentType::create($array);
		if ( $incidentType ) {
			return true;
		}

		return false;
	} 

	public function updateIncidentType( array $array) {

		$incidentType = IncidentType::find($array['id']);
		$incidentType->category_id = $array['category_id'];
		$incidentType->name = $array['name'];

		$incidentType->save();

		if ( $incidentType ) {
			return true;
		}

		return false;
	} 

	/**
	 * ***************************************************************************
	 * Get incident category 
	 * ***************************************************************************
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public  function get_incident_category( $id ) {
		$category = new IncidentType;
		return Response::json($category->where('category_id', '=', $id)->get());
	}

	// the method below is the to fetch all incident types.
	// the 
	public function getIncidentTypes() {
		$incidentTypes = new IncidentType;
		return Response::json($incidentTypes->all());
	}

	/**
	 * ***************************************************************************
	 * [getIncidentType description]
	 * ***************************************************************************
	 * @return [type] [description]
	 */
	public function getIncidentType() {
		return incidentType::all();
	}
}


 ?>