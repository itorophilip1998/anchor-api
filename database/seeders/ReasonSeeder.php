<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Reason;

class ReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Reason::create([
            'incident_type_id' => 1,
            'reason_category_id' => 1,
            'reason' => 'Transition to Nursing Home '
        ]);
          Reason::create([
            'incident_type_id' => 1,
            'reason_category_id' => 1,
            'reason' => 'Transition to Rehab'
        ]);
            Reason::create([
            'incident_type_id' => 1,
            'reason_category_id' => 1,
            'reason' => 'Hospitalized'
        ]);

         Reason::create([
            'incident_type_id' => 1,
            'reason_category_id' => 1,
            'reason' => 'Transition to Other Care Options'
        ]);

        Reason::create([
            'incident_type_id' => 1,
            'reason_category_id' => 2,
            'reason' => 'COVID-19 Related '
        ]);

         Reason::create([
            'incident_type_id' => 1,
            'reason_category_id' => 2,
            'reason' => 'Not COVID-19 Related '
        ]);

        Reason::create([
            'incident_type_id' => 1,
            'reason_category_id' => 3,
            'reason' => 'Contract Terminated'
        ]);

        Reason::create([
            'incident_type_id' => 1,
            'reason_category_id' => 3,
            'reason' => 'Loss of Eligibility'
        ]);

        Reason::create([
            'incident_type_id' => 1,
            'reason_category_id' => 3,
            'reason' => 'HRA to MLTC/MCO Transfer'
        ]);


        Reason::create([
            'incident_type_id' => 1,
            'reason_category_id' => 4,
            'reason' => 'Service Paused/On Hold'
        ]);


        Reason::create([
            'incident_type_id' => 1,
            'reason_category_id' => 4,
            'reason' => 'CDPAP'
        ]);


        Reason::create([
            'incident_type_id' => 1,
            'reason_category_id' => 4,
            'reason' => 'Relocate'
        ]);

        Reason::create([
            'incident_type_id' => 2,
            'reason_category_id' => 6,
            'reason' => 'Hospitalization'
        ]);

         Reason::create([
            'incident_type_id' => 2,
            'reason_category_id' => 5,
            'reason' => 'Post-Hospitalization'
        ]);

         Reason::create([
            'incident_type_id' => 2,
            'reason_category_id' => 8,
            'reason' => 'Bed Sores'
        ]);

          Reason::create([
            'incident_type_id' => 2,
            'reason_category_id' => 8,
            'reason' => 'UTI'
        ]);


          Reason::create([
            'incident_type_id' => 2,
            'reason_category_id' => 8,
            'reason' => 'COPD'
        ]);


        Reason::create([
            'incident_type_id' => 2,
            'reason_category_id' => 8,
            'reason' => 'Constipation'
        ]);

        Reason::create([
            'incident_type_id' => 3,
            'reason_category_id' => 4,
            'reason' => 'Service Hold'
        ]);

        Reason::create([
            'incident_type_id' => 2,
            'reason_category_id' => 7,
            'reason' => 'Falls'
        ]);

        
    }
}
