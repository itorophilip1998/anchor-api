<?php

namespace Database\Seeders;

use App\Models\IncidentPhase;
use Illuminate\Database\Seeder;

class IncidentPhaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IncidentPhase::create(['id' => 1,  'name' => 'Identification', 'order' => 1]);
        IncidentPhase::create(['id' => 2,  'name' => 'Analysis', 'order' => 2]);
        IncidentPhase::create(['id' => 3,  'name' => 'Investigation', 'order' => 3]);
        IncidentPhase::create(['id' => 4,  'name' => 'Resolution', 'order' => 4]);
        IncidentPhase::create(['id' => 5,  'name' => 'Followup', 'order' => 5]);
        IncidentPhase::create(['id' => 6,  'name' => 'Feedback', 'order' => 6]);
    }
}
