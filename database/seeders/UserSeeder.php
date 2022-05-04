<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstname' => 'Lionel',
            'lastname' => 'Francis',
            'email' => 'admin@email.com',
            'role_id' => 1,
             'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'firstname' => 'Roxine',
            'lastname' => 'Green',
            'email' => 'hr@email.com',
            'role_id' => 2,
             'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'firstname' => 'Kevin',
            'lastname' => 'Smith',
            'email' => 'ccmanager@email.com',
            'role_id' => 3,
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'firstname' => 'Damion',
            'lastname' => 'Howell',
            'email' => 'cc@email.com',
            'role_id' => 4,
             'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'firstname' => 'Sandel',
            'lastname' => 'Row',
            'email' => 'ic@email.com',
            'role_id' => 5,
             'password' => bcrypt('password'),
        ]);

         DB::table('users')->insert([
            'firstname' => 'Kerry',
            'lastname' => 'Ann',
            'email' => 'nurse@email.com',
            'role_id' => 6,
            'password' => bcrypt('password'),
        ]);


         DB::table('users')->insert([
            'firstname' => 'James',
            'lastname' => 'Gordon',
            'email' => 'homecareworker@email.com',
            'role_id' => 7,
             'password' => bcrypt('password'),
        ]);

           DB::table('users')->insert([
            'firstname' => 'Henry',
            'lastname' => 'James',
            'email' => 'client@email.com',
            'role_id' => 8,
             'password' => bcrypt('password'),
        ]);

        
    }
}
