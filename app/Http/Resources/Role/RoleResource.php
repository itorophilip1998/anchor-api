<?php

namespace App\Http\Resources\Role;

use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{

    public static $wrap = null;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'uid' => $this->uid,
            'name' => $this->name,
            'desc' => $this->decs,
            'permissions' => $this->permissions,
            'perms' => $this->showPemission($this->permissions->toArray())
        ];
    }

    public function showPemission(array $permissions) {

        $response = array();
        $client = array();
        $complaints = array();
        $homecareworker = array();
        $nurse = array();
        $coordinator = array();
        $incident= array();
        $task = array();
        $referral = array();
        $perms = array();
        $user = array();


        $client_management_access = false;
        $client_create = false;
        $client_show = false;
        $client_edit = false;
        $client_delete = false;

        $complaints_management_access = false;
        $complaints_create = false;
        $complaints_show = false;
        $complaints_edit = false;
        $complaints_delete = false;

        $homecareworker_management_access = false;
        $homecareworker_create = false;
        $homecareworker_show = false;
        $homecareworker_edit = false;
        $homecareworker_delete = false;

        $nurse_management_access = false;
        $nurse_create = false;
        $nurse_show = false;
        $nurse_edit = false;
        $nurse_delete = false;

        $coordinator_management_access = false;
        $coordinator_create = false;
        $coordinator_show = false;
        $coordinator_edit = false;
        $coordinator_delete = false;

        $incident_management_access = false;
        $incident_create = false;
        $incident_show = false;
        $incident_edit = false;
        $incident_delete = false;

        $task_management_access = false;
        $task_create = false;
        $task_show = false;
        $task_edit = false;
        $task_delete = false;

        $referral_management_access = false;
        $referral_create = false;
        $referral_show = false;
        $referral_edit = false;
        $referral_delete = false;

        $permission_management_access = false;
        $permission_create = false;
        $permission_show = false;
        $permission_edit = false;
        $permission_delete = false;

        $user_management_access = false;
        $user_create = false;
        $user_show = false;
        $user_edit = false;
        $user_delete = false;

        foreach($permissions as $perm) {

            if ($perm['name'] == 'client_management_access') {
                 $client_management_access = true;
            }
            
            if ($perm['name'] == 'client_create') {
                  $client_create = true;
            }

            if ($perm['name'] == 'client_show') {
                  $client_show = true;
            }

            if ($perm['name'] == 'client_delete') {
                  $client_delete = true;
            }


            if ($perm['name'] == 'client_edit') {
                  $client_edit = true;
            }

            if ($perm['name'] == 'complaints_management_access') {
                 $complaints_management_access = true;
            }
            
            if ($perm['name'] == 'complaints_create') {
                  $complaints_create = true;
            }

            if ($perm['name'] == 'complaints_show') {
                  $complaints_show = true;
            }

            if ($perm['name'] == 'complaints_delete') {
                  $complaints_delete = true;
            }


            if ($perm['name'] == 'complaints_edit') {
                  $complaints_edit = true;
            }

            if ($perm['name'] == 'homecareworker_management_access') {
                 $homecareworker_management_access = true;
            }
            
            if ($perm['name'] == 'homecareworker_create') {
                  $homecareworker_create = true;
            }

            if ($perm['name'] == 'homecareworker_show') {
                  $homecareworker_show = true;
            }

            if ($perm['name'] == 'homecareworker_delete') {
                  $homecareworker_delete = true;
            }

            if ($perm['name'] == 'homecareworker_edit') {
                  $homecareworker_edit = true;
            }

            if ($perm['name'] == 'nurse_management_access') {
                 $nurse_management_access = true;
            }
            
            if ($perm['name'] == 'nurse_create') {
                  $nurse_create = true;
            }

            if ($perm['name'] == 'nurse_show') {
                  $nurse_show = true;
            }

            if ($perm['name'] == 'nurse_delete') {
                  $nurse_delete = true;
            }

            if ($perm['name'] == 'nurse_edit') {
                  $nurse_edit = true;
            }

            if ($perm['name'] == 'coordinator_management_access') {
                 $coordinator_management_access = true;
            }
            
            if ($perm['name'] == 'coordinator_create') {
                  $coordinator_create = true;
            }

            if ($perm['name'] == 'coordinator_show') {
                  $coordinator_show = true;
            }

            if ($perm['name'] == 'coordinator_delete') {
                  $coordinator_delete = true;
            }

            if ($perm['name'] == 'coordinator_edit') {
                  $coordinator_edit = true;
            }

            if ($perm['name'] == 'incident_management_access') {
                 $incident_management_access = true;
            }
            
            if ($perm['name'] == 'incident_create') {
                  $incident_create = true;
            }

            if ($perm['name'] == 'incident_show') {
                  $incident_show = true;
            }

            if ($perm['name'] == 'incident_delete') {
                  $incident_delete = true;
            }

            if ($perm['name'] == 'incident_edit') {
                  $incident_edit = true;
            }

            if ($perm['name'] == 'task_management_access') {
                 $task_management_access = true;
            }
            
            if ($perm['name'] == 'task_create') {
                  $task_create = true;
            }

            if ($perm['name'] == 'task_show') {
                  $task_show = true;
            }

            if ($perm['name'] == 'task_delete') {
                  $task_delete = true;
            }

            if ($perm['name'] == 'task_edit') {
                  $task_edit = true;
            }

             if ($perm['name'] == 'permission_management_access') {
                 $permission_management_access = true;
            }
            
            if ($perm['name'] == 'permission_create') {
                  $permission_create = true;
            }

            if ($perm['name'] == 'permission_show') {
                  $permission_show = true;
            }

            if ($perm['name'] == 'permission_delete') {
                  $permission_delete = true;
            }

            if ($perm['name'] == 'permission_edit') {
                  $permission_edit = true;
            }

                  if ($perm['name'] == 'user_management_access') {
                 $user_management_access = true;
            }
            
            if ($perm['name'] == 'user_create') {
                  $user_create = true;
            }

            if ($perm['name'] == 'user_show') {
                  $user_show = true;
            }

            if ($perm['name'] == 'user_delete') {
                  $user_delete = true;
            }

            if ($perm['name'] == 'user_edit') {
                  $user_edit = true;
            }

        }
            
           $client[] = array('name' => 'Client Create', 'access' => $client_create, 'id' => 'client_create' );
           $client[] = array('name' => 'Client Show', 'access' => $client_show, 'id' => 'client_show' );
           $client[] = array('name' => 'Client Delete', 'access' => $client_delete, 'id' => 'client_delete' );
           $client[] = array('name' => 'Client Edit', 'access' => $client_edit, 'id' => 'client_edit' );

           $complaints[] = array('name' => 'Complaints Create', 'access' => $complaints_create, 'id' => 'complaints_create' );
           $complaints[] = array('name' => 'Complaints Show', 'access' => $complaints_show, 'id'     => 'complaints_show' );
           $complaints[] = array('name' => 'Complaints Delete', 'access' => $complaints_delete, 'id' => 'complaints_delete' );
           $complaints[] = array('name' => 'Complaints Edit', 'access' => $complaints_edit, 'id'     => 'complaints_edit' );

           $homecareworker[] = array('name' => 'Homecareworker Create', 'access' => $homecareworker_create, 'id' => 'homecareworker_create' );
           $homecareworker[] = array('name' => 'Homecareworker Show', 'access' => $homecareworker_show, 'id'     => 'homecareworker_show' );
           $homecareworker[] = array('name' => 'Homecareworker Delete', 'access' => $homecareworker_delete, 'id' => 'homecareworker_delete' );
           $homecareworker[] = array('name' => 'Homecareworker Edit', 'access' => $homecareworker_edit, 'id'     => 'homecareworker_edit' );

           $nurse[] = array('name' => 'Nurse Create', 'access' => $nurse_create, 'id' => 'nurse_create' );
           $nurse[] = array('name' => 'Nurse Show', 'access' => $nurse_show, 'id'     => 'nurse_show' );
           $nurse[] = array('name' => 'Nurse Delete', 'access' => $nurse_delete, 'id' => 'nurse_delete' );
           $nurse[] = array('name' => 'Nurse Edit', 'access' => $nurse_edit, 'id'     => 'nurse_edit' );

           $coordinator[] = array('name' => 'Coordinator Create', 'access' => $coordinator_create, 'id' => 'coordinator_create' );
           $coordinator[] = array('name' => 'Coordinator Show', 'access' => $coordinator_show, 'id'     => 'coordinator_show' );
           $coordinator[] = array('name' => 'Coordinator Delete', 'access' => $coordinator_delete, 'id' => 'coordinator_delete' );
           $coordinator[] = array('name' => 'Coordinator Edit', 'access' => $coordinator_edit, 'id'     => 'coordinator_edit' );

           $incident[] = array('name' => 'Incident Create', 'access' => $incident_create, 'id' => 'incident_create' );
           $incident[] = array('name' => 'Incident Show', 'access' => $incident_show, 'id'     => 'incident_show' );
           $incident[] = array('name' => 'Incident Delete', 'access' => $incident_delete, 'id' => 'incident_delete' );
           $incident[] = array('name' => 'Incident Edit', 'access' => $incident_edit, 'id'     => 'incident_edit' );

           $task[] = array('name' => 'Task Create', 'access' => $task_create, 'id' => 'task_create' );
           $task[] = array('name' => 'Task Show', 'access' => $task_show, 'id'     => 'task_show' );
           $task[] = array('name' => 'Task Delete', 'access' => $task_delete, 'id' => 'task_delete' );
           $task[] = array('name' => 'Task Edit', 'access' => $task_edit, 'id'     => 'task_edit' );

           $perms[] = array('name' => 'Permission Create', 'access' => $permission_create, 'id' => 'permission_create' );
           $perms[] = array('name' => 'Permission Show', 'access'   => $permission_show, 'id'   => 'permission_show' );
           $perms[] = array('name' => 'Permission Delete', 'access' => $permission_delete, 'id' => 'permission_delete' );
           $perms[] = array('name' => 'Permission Edit', 'access'   => $permission_edit, 'id'   => 'permission_edit' );

           $user[] = array('name' => 'User Create', 'access' => $user_create, 'id' => 'user_create' );
           $user[] = array('name' => 'User Show',   'access' => $user_show,   'id' => 'user_show' );
           $user[] = array('name' => 'User Delete', 'access' => $user_delete, 'id' => 'user_delete' );
           $user[] = array('name' => 'User Edit',   'access' => $user_edit,   'id' => 'user_edit' );

           $permission[] = array(
             'access'     =>  $client_management_access,
             'name'       => 'Client Management',
             'id'         => 'client_management_access',
             'children'   => $client
           );

           $permission[] = array(
                'access'  =>  $user_management_access ,
                'name'    => 'User Management',
                'id'      => 'user_management_access',
               'children'  => $user
            );

           $permission[] = array(
              'access'  =>  $complaints_management_access,
              'name'    => 'Complaints Management',
              'id'      => 'complaints_management_access',
              'children'   => $complaints
           );

            $permission[] = array(
               'access' =>  $homecareworker_management_access,
               'name' => 'Home Care Worker Management',
               'id'   => 'homecareworker_management_access',
                'children'   => $homecareworker
            );

            $permission[] = array(
                'access'  =>  $nurse_management_access,
                'name'    => 'Nurse Management',
                'id'      => 'nurse_management_access',
                 'children'   => $nurse
            );

            $permission[] = array(
                'access'  =>  $coordinator_management_access,
                'name'    => 'Coordinator Management',
                'id'      => 'coordinator_management_access',
                'children' => $coordinator
            );

             $permission[] = array(
                'access'  =>  $incident_management_access,
                'name'    => 'Incident Management',
                'id'      => 'incident_management_access',
                'children' => $incident
             );

             $permission[] = array(
                'access'  =>  $task_management_access,
                'name'    => 'Task Management',
                'id'      => 'task_management_access',
               'children'  => $task
             );


             $permission[] = array(
                'access'  =>  $permission_management_access ,
                'name'    => 'Permission Management',
                'id'      => 'permission_management_access',
               'children'  => $perms
             );

            // 'referral_management_access'       => $referral_management_access,
            
            return $permission;
    }

}
