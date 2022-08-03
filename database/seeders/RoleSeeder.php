<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;
use App\Helpers\Helper;
use Spatie\Permission\Models\Role;
use DB;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


          $adminrole = Role::create([
            'guard_name' => 'sanctum',
            'name' => 'Admin',
            'uid' => Helper::IDGenerator(new Role, 'uid', 'RLE', 5)
          ]);
          
          $client_management_access = Permission::create(['guard_name' => 'sanctum', 'name' => 'client_management_access']);
          $adminrole->givePermissionTo($client_management_access);

          $homecareworker_management_access = Permission::create(['guard_name' => 'sanctum', 'name' => 'homecareworker_management_access']);
          $adminrole->givePermissionTo($homecareworker_management_access);

          $coordinator_management_access =  Permission::create(['guard_name' => 'sanctum', 'name' => 'coordinator_management_access']);
          $adminrole->givePermissionTo($coordinator_management_access);
          
          $user_management_access =  Permission::create(['guard_name' => 'sanctum', 'name' => 'user_management_access']);
          $adminrole->givePermissionTo($user_management_access);

          $nurse_management_access =  Permission::create(['guard_name' => 'sanctum', 'name' => 'nurse_management_access']);
          $adminrole->givePermissionTo($nurse_management_access);

          $admin_management_access =  Permission::create(['guard_name' => 'sanctum', 'name' => 'admin_management_access']);
          $adminrole->givePermissionTo($admin_management_access);

          $incident_management_access =  Permission::create(['guard_name' => 'sanctum', 'name' => 'incident_management_access']);
          $adminrole->givePermissionTo($incident_management_access);

          $complaints_management_access =  Permission::create(['guard_name' => 'sanctum', 'name' => 'complaints_management_access']);
          $adminrole->givePermissionTo($complaints_management_access);

          $task_management_accesss =  Permission::create(['guard_name' => 'sanctum', 'name' => 'task_management_access']);
          $adminrole->givePermissionTo($task_management_accesss);

          $marketing_management_access =  Permission::create(['guard_name' => 'sanctum', 'name' => 'marketing_management_access']);
          $adminrole->givePermissionTo($marketing_management_access);

          $permission_management_access =  Permission::create(['guard_name' => 'sanctum', 'name' => 'permission_management_access']);
          $adminrole->givePermissionTo($permission_management_access);

          $task_create =  Permission::create(['guard_name' => 'sanctum', 'name' => 'task_create']);
          $adminrole->givePermissionTo($task_create);

          $task_edit =  Permission::create(['guard_name' => 'sanctum', 'name' => 'task_edit']);
          $adminrole->givePermissionTo($task_edit);

          $task_delete =  Permission::create(['guard_name' => 'sanctum', 'name' => 'task_delete']);
          $adminrole->givePermissionTo($task_delete);

          $task_show =  Permission::create(['guard_name' => 'sanctum', 'name' => 'task_show']);
          $adminrole->givePermissionTo($task_show);

          $client_create =  Permission::create(['guard_name' => 'sanctum', 'name' => 'client_create']);
          $adminrole->givePermissionTo($client_create);

          $client_edit =  Permission::create(['guard_name' => 'sanctum', 'name' => 'client_edit']);
          $adminrole->givePermissionTo($client_edit);

          $client_show =  Permission::create(['guard_name' => 'sanctum', 'name' => 'client_show']);
          $adminrole->givePermissionTo($client_show);
          
          $client_delete =  Permission::create(['guard_name' => 'sanctum', 'name' => 'client_delete']);
          $adminrole->givePermissionTo($client_delete);


        


          Permission::create(['guard_name' => 'sanctum', 'name' => 'homecareworker_create']);
          Permission::create(['guard_name' => 'sanctum', 'name' => 'homecareworker_edit']);
          Permission::create(['guard_name' => 'sanctum', 'name' => 'homecareworker_delete']);
          Permission::create(['guard_name' => 'sanctum', 'name' => 'homecareworker_show']);

          Permission::create(['guard_name' => 'sanctum', 'name' => 'coordinator_create']);
          Permission::create(['guard_name' => 'sanctum', 'name' => 'coordinator_edit']);
          Permission::create(['guard_name' => 'sanctum', 'name' => 'coordinator_delete']);
          Permission::create(['guard_name' => 'sanctum', 'name' => 'coordinator_show']);

          Permission::create(['guard_name' => 'sanctum', 'name' => 'nurse_create']);
          Permission::create(['guard_name' => 'sanctum', 'name' => 'nurse_edit']);
          Permission::create(['guard_name' => 'sanctum', 'name' => 'nurse_delete']);
          Permission::create(['guard_name' => 'sanctum', 'name' => 'nurse_show']);

          Permission::create(['guard_name' => 'sanctum', 'name' => 'referral_create']);
          Permission::create(['guard_name' => 'sanctum', 'name' => 'referral_edit']);
          Permission::create(['guard_name' => 'sanctum', 'name' => 'referral_delete']);
          Permission::create(['guard_name' => 'sanctum', 'name' => 'referral_show']);

          Permission::create(['guard_name' => 'sanctum', 'name' => 'complaints_create']);
          Permission::create(['guard_name' => 'sanctum', 'name' => 'complaints_edit']);
          Permission::create(['guard_name' => 'sanctum', 'name' => 'complaints_delete']);
          Permission::create(['guard_name' => 'sanctum', 'name' => 'complaints_show']);

          Permission::create(['guard_name' => 'sanctum', 'name' => 'complaint_management_access']);

          Permission::create(['guard_name' => 'sanctum', 'name' => 'incident_create']);
          Permission::create(['guard_name' => 'sanctum', 'name' => 'incident_edit']);
          Permission::create(['guard_name' => 'sanctum', 'name' => 'incident_delete']);
          Permission::create(['guard_name' => 'sanctum', 'name' => 'incident_show']);

          // Permission::create(['guard_name' => 'sanctum', 'name' => 'permission_create']);
          // Permission::create(['guard_name' => 'sanctum', 'name' => 'permission_edit']);
          Permission::create(['guard_name' => 'sanctum', 'name' => 'permission_delete']);
          // Permission::create(['guard_name' => 'sanctum', 'name' => 'permission_show']);

          Permission::create(['guard_name' => 'sanctum', 'name' => 'user_create']);
          Permission::create(['guard_name' => 'sanctum', 'name' => 'user_edit']);
          Permission::create(['guard_name' => 'sanctum', 'name' => 'user_delete']);
          Permission::create(['guard_name' => 'sanctum', 'name' => 'user_show']);

          $permission_create =  Permission::create(['guard_name' => 'sanctum', 'name' => 'permission_create']);
          $adminrole->givePermissionTo($permission_create);

          $permission_show =  Permission::create(['guard_name' => 'sanctum', 'name' => 'permission_show']);
          $adminrole->givePermissionTo($permission_show);

           $permission_edit =  Permission::create(['guard_name' => 'sanctum', 'name' => 'permission_edit']);
          $adminrole->givePermissionTo($permission_edit);
       
        Role::create([
            'guard_name' => 'sanctum',
            'name' => 'HR',
            'uid' => Helper::IDGenerator(new Role, 'uid', 'RLE', 5)
         ]);

         Role::create([
            'guard_name' => 'sanctum',
            'name' => 'Case Coordinator Manager',
            'uid' => Helper::IDGenerator(new Role, 'uid', 'RLE', 5)
         ]);

         Role::create([
            'guard_name' => 'sanctum',
           'name' => 'Case Coordinator',
            'uid' => Helper::IDGenerator(new Role, 'uid', 'RLE', 5)
         ]);


         Role::create([
            'guard_name' => 'sanctum',
            'name' => 'Intake Coordinator',
            'uid' => Helper::IDGenerator(new Role, 'uid', 'RLE', 5)
         ]);

         Role::create([
            'guard_name' => 'sanctum',
            'name' => 'Nurse',
            'uid' => Helper::IDGenerator(new Role, 'uid', 'RLE', 5)
         ]);

         Role::create([
            'guard_name' => 'sanctum',
            'name' =>   'Home Care Worker',
            'uid' => Helper::IDGenerator(new Role, 'uid', 'RLE', 5)
         ]);

         Role::create([
            'guard_name' => 'sanctum',
            'name' =>   'Client',
            'uid' => Helper::IDGenerator(new Role, 'uid', 'RLE', 5)
         ]);
    }
}
