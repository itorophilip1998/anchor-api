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
            'name' => 'Internal Investigation'
        ]);

        InvestigationType::create([
            'name' => 'Nurse Visit'
        ]);

        InvestigationType::create([
            'name' => 'File Review'
        ]);

        InvestigationType::create([
            'name' => 'Third-party Investigation'
        ]);

        InvestigationType::create([
            'name' => 'Telephone Contact'
        ]);


    }
}
