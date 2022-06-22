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
        'name' => 'Long Text'
      ]);

      TaskFieldElement::create([
        'name' => 'Short Text'
      ]);

      TaskFieldElement::create([
        'name' => 'Multiple Choice'
      ]);

      TaskFieldElement::create([
        'name' => 'Phone Number'
      ]);

      TaskFieldElement::create([
        'name' => 'Yes/No'
      ]);

      TaskFieldElement::create([
        'name' => 'Social Security Number'
      ]);

      TaskFieldElement::create([
        'name' => 'Date'
      ]);

      TaskFieldElement::create([
        'name' => 'Email'
      ]);

      TaskFieldElement::create([
        'name' => 'Number'
      ]);

      TaskFieldElement::create([
         'name' => 'Hospital'
      ]);

      TaskFieldElement::create([
         'name' => 'Gender'
      ]);
    }
}
