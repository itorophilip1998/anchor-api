<?php 
namespace App\Repositories;

use App\Interfaces\StatusRepositoryInterface;
use App\Models\UserStatus;
use App\Models\User;

class StatusRepository implements StatusRepositoryInterface {

	/**
	 |--------------------------------------------
	 |THIS FUNCTION GET ALL USER STATUSES
	 |---------------------------------------------	
	 * @return [type] [description]
	 */
	public function getAllStatuses() 
	{
      $status = UserStatus::all();
      return response()->json($status); 
	}

	/**
	 * --------------------------------------------------
	 * THIS FUNCTION UPDATE A USER STATUS
	 * ---------------------------------------------------
	 * @param  [type] $userId   [description]
	 * @param  [type] $statusId [description]
	 * @return [type]           [description]
	 */
	public function updateUserStatus($userId, $statusId) 
	{
		$user = User::findOrFail($userId);

		$user->status_id = $statusId;
		$user->save();

		if ( $user->save() ) {
			return [
				'status' => 'Success',
				'message' => 'Status successfully updated'
			];
		}

		return [
			'status' => 'Error',
			'message' => 'Somethin went wrong while trying to update user status'
		];
	}

	public function createStatus(array $attributes) {}

	public function updateStatus($status_id, array $array) {}
}

 ?>