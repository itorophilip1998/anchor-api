<?php 
namespace App\Interfaces;

Interface IncidentRepositoryInterface {

	public function getIncidents(array $params );
	public function getIncidentTypes();
	public function get_incident_details( $id  );
	public function create_incident( array $params);
	public function createIncidentCategory( array $params);
	public function updateIncidentCategory( array $params);
	public function deleteIncidentCategory($id);
	public function deleteIncident($id);
}

 ?>