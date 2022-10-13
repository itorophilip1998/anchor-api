<?php 
namespace App\Services\Permissions;

use App\Http\Resources\Ability\AbilityResource;
// use App\Models\Permission;
use Spatie\Activitylog\Models\Activity;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Helpers\Helper;
use App\Models\User;
use Response;
use Auth;

class PermissionService {

	public function index() {

           $permissions = Auth::user()->getPermissionsViaRoles() ->flatten()
        ->pluck('name')
        ->toArray();;

        return new AbilityResource($permissions);
	}


	/**
	 * get all permission
	 * @return [type] [description]
	 */
	public function getAllPermissions() {

		$permissions = new Permission;
		return new AbilityResource($permissions->get());
	}

	/**
	 * THIS FUNCTION UPDATE USER PERMISSIONS
	 * @param  array  $array  [description]
	 * @param  [type] $roleId [description]
	 * @return [type]         [description]
	 */
	public function updatePermissionByName(array $array, $roleId) {

		if ( $array['access'] == true ) {
			return $this->removePermission($array['id'], $roleId);
		}

		if ( $array['access'] == false ) {
			return $this->addPermission($array['id'], $roleId);
		}
	}

	/**
	 * THIS FUNCTION ADD A PERMISSION IF NOT EXISTS
	 * @param [type] $name   [description]
	 * @param [type] $roleId [description]
	 */
	public function addPermission($name, $roleId) {

		$role = Role::where('uid', '=', $roleId)->first();
	    $role->givePermissionTo($name);

	    activity()
	    ->log('Update permission '.$name);

	    return [
	    	'status' => true,
	    	'message' => 'Permission added'
	    ];

	}

	/**
	 * THIS FUNCTION REMOVE PERMISSION FROM A ROLE
	 * @param  [type] $name   [description]
	 * @param  [type] $roleId [description]
	 * @return [type]         [description]
	 */
	public function removePermission($name, $roleId) {

		activity()
		->log('Update permission '.$name);

		$role = Role::where('uid', '=', $roleId)->first();
		$permission = Permission::where('name', '=', $name)->first();

		$permission->removeRole($role);

		return [
	    	'status' => true,
	    	'message' => 'Permission removed'
	    ];
	}

	/**
	 * THIS FUNCTION CREATES A NEW ROLE
	 * @param  array  $array [description]
	 * @return [type]        [description]
	 */
	public function createRole(array $array) {

	   activity()->log('Create a new user role '.$array['name']);

	   return Role::create([
        'name' => $array['name'],
        'description' => $array['description'],
        'uid' => Helper::IDGenerator(new Role, 'uid', 'USRLE', 5)
      ]);
	}

	public function updateRole(array $array, $roleId) {

		$role = Role::find($roleId);
		$role->name = $array['name'];
		$role->description = $array['description'];
		$role->save();

		if ($role->save() ){
			return [
				'status' => true,
				'message' => 'Role update',
			];
		}

		return [
			'status' => false,
		];
	}
	/**
	 * ***************************************************************
	 * THIS FUNCTION GET ROLE USER 
	 * ***************************************************************
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 * ***************************************************************
	 */
	public function getRoleUsers($id) {
	  	
	   $response = array();

	   $role  = Role::where('id', '=', $id)->first();
	   $users = User::with('roles')->get();

	   foreach($users as $user ) {
	   	 if ($role['name'] === $user['role']['name']) {
	   	 	  $response[] = array(
	   	 	  	'id' => $user->uuid,
		   	 	'name' => $user->firstname.' '.$user->lastname,
		   	 	'role' => $role['name'],
		   	 );
	   	 }
	   }
	   return Response::json($response);
	}

	/**
	 * THIS FUNCTION GET USER NOT IN ROLE
	 * @param  [type] $roleId [description]
	 * @return [type]         [description]
	 */
	public function getUserNotInRole($roleId) {

		$response = array();

		$role  =   Role::where('uid', '=', $roleId)->first();
		$users =  $users = User::with('roles')->get();

		foreach($users as $user) {
		  
		  if ($role['name'] != $user['role']['name']) {
			 	$response[] = array(
			 		'id' => $user->uuid,
			   	 	'name' => $user->firstname.' '.$user->lastname,
			   	 	'role' => $user['role']['name']
				);
		  }
		}

		return Response::json($response);
	}	

	/**
	 * THIS FUNCTION UPDATE USER ROLE
	 * @param  array  $array [description]
	 * @return [type]        [description]
	 */
	public function changeUserRole(array $array) {

		
		$role = Role::where('uid', '=',  $array['roleId'])->first();
		
		$user = User::find($array['userId']);
		$user->role_id = $role->id;
		$user->save();

	    return [
			'status' => true,
			'role' => $role->id,
			'user' => $user 
		];
	}
}

 ?>