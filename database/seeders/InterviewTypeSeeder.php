<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\InterviewType;

class InterviewTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InterviewType::create([
            'name' => 'Family Member'
        ]);
        
        InterviewType::create([
            'name' => 'Home Care Worker'
        ]);

        InterviewType::create([
            'name' => 'Member'
        ]);

        InterviewType::create([
            'name' => 'Witness'
        ]);

        InterviewType::create([
            'name' => 'Client'
        ]);
    }
}
