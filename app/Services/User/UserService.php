<?php 
namespace App\Services\User;

use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Http\Resources\Role\RoleResource;
use App\Http\Resources\Role\RoleCollectio;
use Carbon\Carbon;
use App\Models\UserDetail;

use Response;

class UserService {

	private $user;

	public function __construct() {
		$this->user = new User;
	}

	/**
	 * *************************************************
	 * This Function get user roles
	 * *************************************************
	 * @return [type] [description]
	 */
	public function getUserRoles() {
		return Response::json((new Role)->orderBy('id', 'desc')->get());
	}

	/**
	 * **************************************************************
	 * This function get role buy role id
	 * **************************************************************
	 * @param   string $roleDI unique role id
	 * @return  array        list role details
	 */
	public function getRoleById($roleId) {

		$role = new Role;
		$details = $role->where('uid', '=', $roleId)->first();

		return new RoleResource($details);
	}

	public function createUser(array $params) {

		$user = New User;
		$user->firstname = $params['firstname'];
		$user->lastname = $params['lastname'];
		$user->email = $params['email'];
		$user->role_id = Role::where('name', '=', $params['role'])->first()->id;
		$user->password =  bcrypt('password');
		$user->save();

		if ( $user->save() ) {
			// Send generagte default password and send email
			$details = new UserDetail;
			$details->user_id = $user->uuid;
			$details->dob = Carbon::parse($user->dob)->format('Y-m-d');;
			$details->save();

			if ( $details->save()) {
				return [
					'status' => true,
					'message' => 'User successfully save'
			    ];
			}
			
		}

		return [
			'status' => false,
			'message' => 'Somethin went wrong while trying to showing user information'
	    ];
	}

	/**
	 * This function get all suer infromation
	 * @param  array  $array [description]
	 * @return [type]        [description]
	 */
	public function getAllUser(array $array) {

		$user = User::with('role')->orderBy('created_at', 'desc')->get();
		return Response::json($user);
	}

	/**
	 * ************************************************************
	 * this function add user permissions
	 * ************************************************************
	 * @param array $array [description]
	 */
	public function addPermission( array $array) {

	}	

	/**
	 * [getUserByRoleName description]
	 * @param  [type] $name [description]
	 * @return [type]       [description]
	 */
	public function getUserByRoleName( $name ) {
		return $users =  User::role($name)->get();
	}
}


 ?>