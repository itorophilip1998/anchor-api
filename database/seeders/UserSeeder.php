<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Str;
use App\Models\User;
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
       $user = User::create([
            'firstname' => 'Cristiano',
            'lastname' => 'Ronaldo',
            'email' => 'admin@email.com',
            'role_id' => 1,
            'password' => bcrypt('password'),
        ]);


       $user->assignRole('Admin');


       $user = User::create([
            'uuid' => Str::uuid(),
            'firstname' => 'Roxine',
            'lastname' => 'Green',
            'email' => 'hr@email.com',
            'role_id' => 2,
             'password' => bcrypt('password'),
        ]);

       $user->assignRole('HR');

        $user = User::create([
            'uuid' => Str::uuid(),
            'firstname' => 'Kevin',
            'lastname' => 'Smith',
            'email' => 'ccmanager@email.com',
            'role_id' => 3,
            'password' => bcrypt('password'),
        ]);

       $user->assignRole('Case Coordinator Manager');

        $user = User::create([
            'uuid' => Str::uuid(),
            'firstname' => 'Damion',
            'lastname' => 'Howell',
            'email' => 'cc@email.com',
            'role_id' => 4,
             'password' => bcrypt('password'),
        ]);

         $user->assignRole('Case Coordinator');

         $user = User::create([
            'uuid' => Str::uuid(),
            'firstname' => 'James',
            'lastname' => 'Gordon',
            'email' => 'cc1@email.com',
            'role_id' => 4,
            'password' => bcrypt('password'),
        ]);

          $user->assignRole('Case Coordinator');

        $user = User::create([
            'uuid' => Str::uuid(),
            'firstname' => 'Lance',
            'lastname' => 'Jefferson',
            'email' => 'cc2@email.com',
            'role_id' => 4,
            'password' => bcrypt('password'),
        ]);

         $user->assignRole('Case Coordinator');


        $user = User::create([
            'uuid' => Str::uuid(),
            'firstname' => 'Sandel',
            'lastname' => 'Row',
            'email' => 'ic@email.com',
            'role_id' => 5,
             'password' => bcrypt('password'),
        ]);

         $user->assignRole('Intake Coordinator');

         $user = User::create([
            'uuid' => Str::uuid(),
            'firstname' => 'Kerry',
            'lastname' => 'Ann',
            'email' => 'nurse@email.com',
            'role_id' => 6,
            'password' => bcrypt('password'),
         ]);

         $user->assignRole('Nurse');

         $user = User::create([
            'uuid' => Str::uuid(),
            'firstname' => 'Jane',
            'lastname' => 'Jessica',
            'email' => 'nurse1@email.com',
            'role_id' => 6,
            'password' => bcrypt('password'),
         ]);

         $user->assignRole('Nurse');

         $user = User::create([
            'uuid' => Str::uuid(),
            'firstname' => 'Johnsom',
            'lastname' => 'Jamie',
            'email' => 'nurse2@email.com',
            'role_id' => 6,
            'password' => bcrypt('password'),
         ]);
           $user->assignRole('Nurse');


         $user = User::create([
            'uuid' => Str::uuid(),
            'firstname' => 'James',
            'lastname' => 'Gordon',
            'email' => 'homecareworker@email.com',
            'role_id' => 7,
             'password' => bcrypt('password'),
        ]);
         $user->assignRole('Home Care Worker');

          $user = User::create([
            'uuid' => Str::uuid(),
            'firstname' => 'King',
            'lastname' => 'Francis',
            'email' => 'homecareworker1@email.com',
            'role_id' => 7,
            'password' => bcrypt('password'),
          ]);

           $user->assignRole('Home Care Worker');


          $user = User::create([
            'uuid' => Str::uuid(),
            'firstname' => 'Jimie',
            'lastname' => 'Coal',
            'email' => 'homecareworker3@email.com',
            'role_id' => 7,
            'password' => bcrypt('password'),
          ]);
           $user->assignRole('Home Care Worker');


           $user = User::create([
                'uuid' => Str::uuid(),
                'firstname' => 'Henry',
                'lastname' => 'James',
                'email' => 'client@email.com',
                'role_id' => 8,
                 'password' => bcrypt('password'),
            ]);

            $user->assignRole('Client');

        $user = User::create([
            'uuid' => Str::uuid(),
            'firstname' => 'Everton',
            'lastname' => 'Green',
            'email' => 'client1@email.com',
            'role_id' => 8,
             'password' => bcrypt('password'),
        ]);
          $user->assignRole('Client');

         $user = User::create([
            'uuid' => Str::uuid(),
            'firstname' => 'Christ',
            'lastname' => 'Brown',
            'email' => 'client2@email.com',
            'role_id' => 8,
             'password' => bcrypt('password'),
        ]);
           $user->assignRole('Client');

        $user = User::create([
            'uuid' => Str::uuid(),
            'firstname' => 'Rober',
            'lastname' => 'Reece',
            'email' => 'client3@email.com',
            'role_id' => 8,
             'password' => bcrypt('password'),
        ]);
          $user->assignRole('Client');

        $user = User::create([
            'uuid' => Str::uuid(),
            'firstname' => 'Shiba',
            'lastname' => 'Tatsuya',
            'email' => 'client4@email.com',
            'role_id' => 8,
             'password' => bcrypt('password'),
        ]);
          $user->assignRole('Client');

        
    }
}
