<?php 
namespace App\Interfaces;

Interface IncidentRepositoryInterface {

	public function getIncidents(array $params );
	public function getIncidentTypes();
	public function get_incident_details( $id  );
	public function create_incident( array $params);
}

 ?>