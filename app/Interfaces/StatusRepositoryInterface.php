<?php 
namespace App\Interfaces;

Interface StatusRepositoryInterface{

	public function getAllStatuses();
	public function updateUserStatus($user_id, $status_id);
	public function createStatus(array $array);
	public function updateStatus($statusId, array $array);
}

 ?>