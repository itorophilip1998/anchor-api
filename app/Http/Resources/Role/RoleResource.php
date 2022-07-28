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

        $client_management_access = false;
        $complaints_management_access = false;
        $homecareworker_management_access = false;
        $nurse_management_access = false;
        $coordinator_management_access = false;
        $incident_management_access = false;
        $task_management_access = false;
        $referral_management_access = false;

        foreach($permissions as $perm) {
            
            if ( $perm['name'] == 'client_management_access') {
                 $client_management_access = true;
            }

            if ( $perm['name'] == 'complaints_management_access') {
                 $complaints_management_access = true;
            }

            if ( $perm['name'] == 'homecareworker_management_access') {
                 $homecareworker_management_access = true;
            }

            if ( $perm['name'] == 'nurse_management_access') {
                 $nurse_management_access = true;
            }

             if ( $perm['name'] == 'coordinator_management_access') {
                 $coordinator_management_access = true;
             }

             if ( $perm['name'] == 'incident_management_access') {
                 $incident_management_access = true;
             }

             if ( $perm['name'] == 'tasks_management_access') {
                 $task_management_access = true;
             }

            if ( $perm['name'] == 'referral_management_access') {
                 $referral_management_access = true;
             }
        }
      

           $permission[] = array(
             'access'  =>  $client_management_access,
             'name'    => 'Client Management',
             'id'      => 'client_management_access'
           );

           $permission[] = array(
              'access'  =>  $complaints_management_access,
              'name'    => 'Complaints Management',
              'id'      => 'complaints_management_access'
           );

            $permission[] = array(
               'access' =>  $homecareworker_management_access,
               'name' => 'Complaints Management',
               'id' => 'homecareworker_management_access'
            );

            $permission[] = array(
                'access'  =>  $nurse_management_access,
                'name'    => 'Nurses Management',
                'id'      => 'nurse_management_access'
            );

            $permission[] = array(
                'access'  =>  $coordinator_management_access,
                'name'    => 'Coordinator Management',
                'id'      => 'coordinator_management_access'
            );

            // 'incident_management_access'       => $incident_management_access,
            // 'task_management_access'           => $task_management_access,
            // 'referral_management_access'       => $referral_management_access,
            
            return $permission;
    }
}
