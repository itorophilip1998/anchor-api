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
            'name' => 'Job Performance' 
        ]);

        TaskComponent::create([
            'id' => 2,
            'name' => 'Compliance' 
        ]);

        TaskComponent::create([
            'id' => 3,
            'name' => 'Self-Assessment' 
        ]);

        TaskComponent::create([
            'id' => 4,
            'name' => 'Value-Based Engagement' 
        ]);

        TaskComponent::create([
            'id' => 5,
            'name' => 'Happiness Assessment' 
        ]);

        TaskComponent::create([
            'id' => 6,
            'name' => 'Incentive Management' 
        ]);
    }
}
