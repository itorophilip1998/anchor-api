<?php

namespace Database\Seeders;

use App\Models\IncidentLocation;
use Illuminate\Database\Seeder;
use DB;
class IncidentLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IncidentLocation::create([ 'location' => 'Bathroom']);
        IncidentLocation::create([ 'location' => 'Bedroom']);
        IncidentLocation::create([ 'location' => 'Kitchen']);
        IncidentLocation::create([ 'location' => 'Living Room']);
    }
}
