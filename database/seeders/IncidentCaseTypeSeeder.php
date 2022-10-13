<?php

namespace Database\Seeders;

use App\Models\IncidentCaseType;
use Illuminate\Database\Seeder;

class IncidentCaseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IncidentCaseType::create([ 'name' => 'Ambulating']);
        IncidentCaseType::create([ 'name' => 'Dressing']);
        IncidentCaseType::create([ 'name' => 'Bathing']);
        IncidentCaseType::create([ 'name' => 'Feeding']);
        IncidentCaseType::create([ 'name' => 'General Cleaning']);
    }
}
