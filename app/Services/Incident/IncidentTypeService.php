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