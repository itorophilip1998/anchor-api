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
        
        TaskCategorySeeder::create([
            'id' => 1,
            'title' => 'Clinical'
        ]);

        TaskCategorySeeder::create([
            'id' => 2,
            'title' => 'Case Coordinator'
        ]);

        TaskCategorySeeder::create([
            'id' => 3,
            'title' => 'Intake Coordinator'
        ]);

        TaskCategorySeeder::create([
            'id' => 4,
            'title' => 'Billing & Collection Management'
        ]);

        TaskCategorySeeder::create([
            'id' => 5,
            'title' => 'Home Care Workers'
        ]);

        TaskCategorySeeder::create([
            'id' => 6,
            'title' => 'New Business Management'
        ]);

        TaskCategorySeeder::create([
            'id' => 7,
            'title' => 'Corporate/Executives'
        ]);

         TaskCategorySeeder::create([
            'id' => 8,
            'title' => 'Clients'
        ]);
    }
}
