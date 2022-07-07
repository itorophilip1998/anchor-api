<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
         DB::table('roles')->insert(['id' => 1, 'name' => 'Admin',]);
         DB::table('roles')->insert(['id' => 2, 'name' => 'HR']);  
         DB::table('roles')->insert(['id' => 3, 'name' => 'Case Coordinator Manager']);
         DB::table('roles')->insert(['id' => 4, 'name' => 'Case Coordinator']);
         DB::table('roles')->insert(['id' => 5, 'name' => 'Intake Coordinator']);
         DB::table('roles')->insert(['id' => 6, 'name' => 'Nurse']);
         DB::table('roles')->insert(['id' => 7, 'name' => 'Home Care Worker']);         
         DB::table('roles')->insert(['id' => 8, 'name' => 'Client']);      
    }
}
