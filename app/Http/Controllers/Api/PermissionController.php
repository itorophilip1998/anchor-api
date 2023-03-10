<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Services\Permissions\PermissionService;


class PermissionController extends Controller
{


    private $permission;

    public function __construct(PermissionService $permissionservice) {
      $this->permission = $permissionservice;
    }

   /**
     * This functon get all permissions
     * @return [type] [description]
     */
    public function index() {
        return $this->permission->index();
    }

    /**
     * [storeRole description]
     * @return [type] [description]
     */
    public function storeRole(Request $request) {

        $attributes = $request->all();
        return $this->permission->addNewRole($attributes);
    }

    public function updateRole( Request $request, $id) {

        $attr = $request->all();
        return $this->permission->updateRole($attr, $id);
    }
    /**
     * THIS FUNCTION UPDATE THE USER PERMISSION ACCESS CONTROL
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function updateUserPermission(Request $request, $id) {

        $attributes = $request->all();
        return $this->permission->updatePermissionByName($attributes, $id);
    }

    public function createRole(Request $request) {

        $attributes = $request->all();
        return $this->permission->createRole($attributes);
    }

    public function usersByRoles(Request $request) {
        $roleIDs = $request->role_ids;
        return $this->permission->getRoleUsersByIds($roleIDs);
    }

    /**
     * this function get user roles
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function roleUser($id) {
        $roleId = $id;
        return $this->permission->getRoleUsers($roleId);
    }

    /**
     * this function get user not in role using id
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function roleUserNotIn($id) {

        $roleId = $id;
        return $this->permission->getUserNotInRole($roleId);
    }

    /**
     * THIS FUNCTION CHANGE USER ROLE
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function changeRole(Request $request) {

        $attr = $request->all();
        return $this->permission->changeUserRole($attr);
    }

    public function fetchAllRoles() {

        $roles = Role::all();

        return $roles;
    }

    public function rolePermission() {}

}

