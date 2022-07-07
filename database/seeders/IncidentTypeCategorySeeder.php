<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\IncidentTypeCategory;

class IncidentTypeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
       IncidentTypeCategory::create(['id' => 1,  'name' => 'Discharges']);
       IncidentTypeCategory::create(['id' => 2,  'name' => 'Changes in Conditions']);
       IncidentTypeCategory::create(['id' => 3,  'name' => 'Service Changes']);
    }
}
