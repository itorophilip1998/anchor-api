<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Action;

class ActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Action::create(['name' =>  'Client Stable' ]); 
         Action::create(['name' =>  'Client Stabilized ']);
         Action::create(['name' =>  'Risk Level Change from High to Low']);
         Action::create(['name' =>  'Medication Reconciled']); 
         Action::create(['name' =>  'Risk Level Change from Low to High']);
         Action::create(['name' =>  'Classified as High Risk for Falls']);
         Action::create(['name' =>  'Adjustment to Care Plan']);
         Action::create(['name' =>  'Retraining of Caregiver and Coordinator']);
         Action::create(['name' =>  'PCP  Contacted Immediately']);
    }
}



       
