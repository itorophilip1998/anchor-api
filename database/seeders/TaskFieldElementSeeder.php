<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\TaskFieldElement;

class TaskFieldElementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      TaskFieldElement::create([
        'id'=> 1,
        'name' => 'Long Text'
      ]);

      TaskFieldElement::create([
        'id' => 2,
        'name' => 'Short Text'
      ]);

      TaskFieldElement::create([
        'id' => 3,
        'name' => 'Multiple Choice'
      ]);

      TaskFieldElement::create([
        'id' => 4,
        'name' => 'Phone Number'
      ]);

      TaskFieldElement::create([
        'id' => 5,
        'name' => 'Yes/No'
      ]);

      TaskFieldElement::create([
        'id' => 6,
        'name' => 'Social Security Number'
      ]);

      TaskFieldElement::create([
        'id' => 7,
        'name' => 'Date'
      ]);

      TaskFieldElement::create([
        'id' => 8,
        'name' => 'Email'
      ]);

      TaskFieldElement::create([
        'id' => 9,
        'name' => 'Number'
      ]);

      TaskFieldElement::create([
            'id' => 10,
         'name' => 'Hospital'
      ]);

      TaskFieldElement::create([
        'id' => 11,
         'name' => 'Gender'
      ]);

       TaskFieldElement::create([
        'id' => 12,
         'name' => 'Suffix'
      ]);

      TaskFieldElement::create([
         'id' => 13,
         'name' => 'Living'
      ]);

       TaskFieldElement::create([
         'id' => 14,
         'name' => 'People'
       ]);

       TaskFieldElement::create([
         'id' => 15,
         'name' => 'County'
       ]);

        TaskFieldElement::create([
         'id' => 16,
         'name' => 'Hospital'
       ]);
    }
}
