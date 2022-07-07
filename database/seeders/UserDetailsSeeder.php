<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use DB;

class UserDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       

        $faker = Faker::create();

        $a = 0; 

        while( $a <= 8) {

             DB::table('user_details')->insert([
                'user_id' => $a + 1,
                'address1' => $faker->address,
                'home_phone' => $faker->phoneNumber,
                'work_phone' => $faker->phoneNumber,
                'cell_phone' => $faker->phoneNumber,
                'city' => $faker->city,
                'state' => $faker->state,
                'zip' => $faker->postcode,
                'gender' => $faker->randomElement(['male', 'female']),
                'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'zip' => $faker->postcode,
                'language' => $faker->languageCode,
                'nationality' => $faker->languageCode
            ]);

            $a++;

        }
    }
}
