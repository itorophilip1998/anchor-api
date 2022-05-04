<?php 
namespace App\Interfaces;

Interface CoordinatorRepositoryInterface {

	public function get_coordinator( array $array );
	public function get_coordinator_by_id( $coord_id );
	public function store_coordinator(array $array);

	public function assign_homecareworker( array $array);

}


 ?>