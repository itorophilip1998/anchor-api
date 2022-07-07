<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstname' => 'Client',
            'lastname' => 'Francis',
            'email' => 'client@anchorgroupcorp.com',
            'role_id' => 8,
            'password' => bcrypt('password'),
        ]);

         DB::table('users')->insert([
            'firstname' => 'Alan',
            'lastname' => 'Watts',
            'email' => 'client2@anchorgroupcorp.com',
            'role_id' => 8,
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'firstname' => 'Time',
            'lastname' => 'Allen',
            'email' => 'client3@anchorgroupcorp.com',
            'role_id' => 8,
            'password' => bcrypt('password'),
        ]);

         DB::table('users')->insert([
            'firstname' => 'Dante',
            'lastname' => 'Alligeri',
            'email' => 'client8@anchorgroupcorp.com',
            'role_id' => 8,
            'password' => bcrypt('password'),
        ]);

         DB::table('users')->insert([
            'firstname' => 'James',
            'lastname' => 'Bronski',
            'email' => 'client5@anchorgroupcorp.com',
            'role_id' => 8,
            'password' => bcrypt('password'),
        ]);

       DB::table('users')->insert([
            'firstname' => 'Albert',
            'lastname' => 'Einstein',
            'email' => 'client6@anchorgroupcorp.com',
            'role_id' => 8,
            'password' => bcrypt('password'),
        ]);

       DB::table('users')->insert([
            'firstname' => 'Neil',
            'lastname' => 'Nbor',
            'email' => 'client7@anchorgroupcorp.com',
            'role_id' => 8,
            'password' => bcrypt('password'),
        ]);

         DB::table('users')->insert([
            'firstname' => 'Jessica',
            'lastname' => 'jones',
            'email' => 'client88@anchorgroupcorp.com',
            'role_id' => 8,
            'password' => bcrypt('password'),
        ]);

         DB::table('users')->insert([
            'firstname' => 'Luke',
            'lastname' => 'Gage',
            'email' => 'client9@anchorgroupcorp.com',
            'role_id' => 8,
            'password' => bcrypt('password'),
        ]);

      DB::table('users')->insert([
            'firstname' => 'Frank',
            'lastname' => 'Smith',
            'email' => 'client10@anchorgroupcorp.com',
            'role_id' => 8,
            'password' => bcrypt('password'),
        ]);

       DB::table('users')->insert([
            'firstname' => 'Kevin',
            'lastname' => 'Howell',
            'email' => 'homecareworker0@anchorgroupcorp.com',
            'role_id' => 7,
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'firstname' => 'Damion',
            'lastname' => 'Howell',
            'email' => 'homecareworker10@anchorgroupcorp.com',
            'role_id' => 7,
            'password' => bcrypt('password'),
        ]);

       DB::table('users')->insert([
            'firstname' => 'Sandel',
            'lastname' => 'Row',
            'email' => 'homecareworker1@anchorgroupcorp.com',
            'role_id' => 7,
            'password' => bcrypt('password'),
        ]);
    }
}
