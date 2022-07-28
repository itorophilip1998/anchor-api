<?php 
namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Http\Resources\UserResource;

use App\Models\User;

class UserRepository implements UserRepositoryInterface {

	/**
	 * THIS FUNCTION GET USER DETAILS BY USER ID
	 * @param  [type] $userID [description]
	 * @return [type]         [description]
	 */
	public function get_user_details( $userID ) {

		$user = User::where('uuid', '=', $userID)->first();
		return new UserResource($user);
	}
}

 ?>