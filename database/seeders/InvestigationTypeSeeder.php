<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\InvestigationType;

class InvestigationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        InvestigationType::create([
            'name' => 'Nurse Report'
        ]);

        InvestigationType::create([
            'name' => 'Coordinator Report'
        ]);

        InvestigationType::create([
            'name' => 'Home Care Worker Report'
        ]);

        InvestigationType::create([
            'name' => 'Third-party Report'
        ]);

    }
}
