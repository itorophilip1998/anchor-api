<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TaskFieldElementValue;

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
            'task_field_element_id' => 12,
            'name' => 'Senior'
        ]);

        TaskFieldElementValue::create([
            'task_field_element_id' => 12,
            'name' => 'Junior'
        ]);
        
        TaskFieldElementValue::create([
            'task_field_element_id' => 12,
            'name' => 'Esq'
        ]);

        TaskFieldElementValue::create([
            'task_field_element_id' => 13,
            'name' => 'Apartment'
        ]);

        TaskFieldElementValue::create([
            'task_field_element_id' => 13,
            'name' => 'House'
        ]);

        TaskFieldElementValue::create([
            'task_field_element_id' => 13,
            'name' => 'Other'
        ]);

        TaskFieldElementValue::create([
            'task_field_element_id' => 14,
            'name' => 'Brother'
        ]);

         TaskFieldElementValue::create([
            'task_field_element_id' => 14,
            'name' => 'Sister'
         ]);

         TaskFieldElementValue::create([
            'task_field_element_id' => 14,
            'name' => 'Roommate'
         ]);

         TaskFieldElementValue::create([
            'task_field_element_id' => 14,
            'name' => 'Father'
         ]);

         TaskFieldElementValue::create([
            'task_field_element_id' => 15,
            'name' => 'Kings'
         ]);

         TaskFieldElementValue::create([
            'task_field_element_id' => 15,
            'name' => 'Manhattan'
         ]);

          TaskFieldElementValue::create([
            'task_field_element_id' => 15,
            'name' => 'Queens'
         ]);

         TaskFieldElementValue::create([
            'task_field_element_id' => 15,
            'name' => 'Nassau'
         ]);

         TaskFieldElementValue::create([
            'task_field_element_id' => 15,
            'name' => 'Westchester'
         ]);

          TaskFieldElementValue::create([
            'task_field_element_id' => 15,
            'name' => 'Suffolk'
          ]);

          TaskFieldElementValue::create([
            'task_field_element_id' => 15,
            'name' => 'The Bronx'
          ]);
          
    }
}
