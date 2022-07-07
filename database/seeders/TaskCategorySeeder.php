<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\TaskCategory;

class TaskCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        TaskCategory::create([
            'id' => 1,
            'title' => 'Clinical'
        ]);

        TaskCategory::create([
            'id' => 2,
            'title' => 'Case Coordinator'
        ]);

        TaskCategory::create([
            'id' => 3,
            'title' => 'Intake Coordinator'
        ]);

        TaskCategory::create([
            'id' => 4,
            'title' => 'Billing & Collection Management'
        ]);

        TaskCategory::create([
            'id' => 5,
            'title' => 'Home Care Workers'
        ]);

        TaskCategory::create([
            'id' => 6,
            'title' => 'New Business Management'
        ]);

        TaskCategory::create([
            'id' => 7,
            'title' => 'Corporate/Executives'
        ]);

         TaskCategory::create([
            'id' => 8,
            'title' => 'Clients'
        ]);
    }
}
