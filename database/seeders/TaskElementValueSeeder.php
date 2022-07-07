<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TaskElementValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TaskFieldElementValue::create([
            'element_id' => 12,
            'name' => 'Senior'
        ]);

        TaskFieldElementValue::create([
            'element_id' => 12,
            'name' => 'Junior'
        ]);
        
        TaskFieldElementValue::create([
            'element_id' => 12,
            'name' => 'Esq'
        ]);

        TaskFieldElementValue::create([
            'element_id' => 13,
            'name' => 'Apartment'
        ]);

        TaskFieldElementValue::create([
            'element_id' => 13,
            'name' => 'House'
        ]);

        TaskFieldElementValue::create([
            'element_id' => 13,
            'name' => 'Other'
        ]);

        TaskFieldElementValue::create([
            'element_id' => 14,
            'name' => 'Brother'
        ]);

         TaskFieldElementValue::create([
            'element_id' => 14,
            'name' => 'Sister'
         ]);

         TaskFieldElementValue::create([
            'element_id' => 14,
            'name' => 'Roommate'
         ]);

         TaskFieldElementValue::create([
            'element_id' => 14,
            'name' => 'Father'
         ]);

         TaskFieldElementValue::create([
            'element_id' => 15,
            'name' => 'Kings'
         ]);

         TaskFieldElementValue::create([
            'element_id' => 15,
            'name' => 'Manhattan'
         ]);

          TaskFieldElementValue::create([
            'element_id' => 15,
            'name' => 'Queens'
         ]);

         TaskFieldElementValue::create([
            'element_id' => 15,
            'name' => 'Nassau'
         ]);

         TaskFieldElementValue::create([
            'element_id' => 15,
            'name' => 'Westchester'
         ]);

          TaskFieldElementValue::create([
            'element_id' => 15,
            'name' => 'Suffolk'
          ]);

          TaskFieldElementValue::create([
            'element_id' => 15,
            'name' => 'The Bronx'
          ]);
          
    }
}
