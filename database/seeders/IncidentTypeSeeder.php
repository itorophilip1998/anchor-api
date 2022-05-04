<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class IncidentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       DB::table('incident_types')->insert([
         'id' => 1, 
         'category_id' => 1,
         'name' => 'Clinical' 
       ]); 

       DB::table('incident_types')->insert([
         'id' => 2, 
         'category_id' => 1,
         'name' => 'Death'
       ]);

       DB::table('incident_types')->insert([
         'id' => 3, 
         'category_id' => 1,
         'name' => 'Eligibility'
       ]);

       DB::table('incident_types')->insert([
          'id' => 4, 
          'category_id' => 3,
          'name' => 'Personal'
       ]);

       DB::table('incident_types')->insert([
          'id' => 5, 
          'category_id' => 2,
          'name' => 'Hospitalization'
       ]);

       DB::table('incident_types')->insert([
            'id' => 6, 
            'category_id' => 2,
            'name' => 'Post Hospitalization'
       ]);

       DB::table('incident_types')->insert([
         'id' => 7, 
         'category_id' => 2,
         'name' => 'Falls'
       ]);

       DB::table('incident_types')->insert([
         'id' => 8, 
         'category_id' => 2,
         'name' => 'Other Clinical Changes'
       ]);
    }
}

