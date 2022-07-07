<?php 
namespace App\Interfaces;

Interface ActiontionRepositoryInterface {

	public function apply_action($params, $id);
	public function get_applied_action($incident_id);
}


 ?>