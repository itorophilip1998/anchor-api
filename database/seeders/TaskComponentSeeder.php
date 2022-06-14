<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\TaskComponent;

class TaskComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        TaskComponent::create([
            'id' => 1,
            'title' => 'Job Performance' 
        ]);

        TaskComponent::create([
            'id' => 2,
            'title' => 'Compliance' 
        ]);

        TaskComponent::create([
            'id' => 3,
            'title' => 'Self-Assessment' 
        ]);

        TaskComponent::create([
            'id' => 4,
            'title' => 'Value-Based Engagement' 
        ]);

        TaskComponent::create([
            'id' => 5,
            'title' => 'Happiness Assessment' 
        ]);

        TaskComponent::create([
            'id' => 6,
            'title' => 'Incentive Management' 
        ]);
    }
}
