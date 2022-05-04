<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InvestigationActivity;

class InvestigationActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    
          InvestigationActivity::create([ 
            'activity' => 'Outreach Clients and/or Client’s Family During Hospitalization'
          ]);

          InvestigationActivity::create([
            'activity' => 'Read Discharge Summary'
          ]);
          
          InvestigationActivity::create([
            'activity' => 'Complete Medication Reconciliation'
          ]);
          InvestigationActivity::create([
            'activity' => 'Provide Education to Client'
          ]);
          InvestigationActivity::create([
            'activity' => 'Provide Education to Caregiver '
          ]);
          InvestigationActivity::create([
            'activity' => 'Provide Education to Case Coordinator'
          ]);
          InvestigationActivity::create([
            'activity' => 'Revise Care Plan'
          ]);


    }
}

 





