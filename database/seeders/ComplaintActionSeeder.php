<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ComplaintAction;
use App\Models\ComplaintActionType;

class ComplaintActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        ComplaintAction::create([
            'id' => 1,
            'action' => 'Was CTU contacted?'
        ]);

            ComplaintActionType::create([
                'complaint_type_id' => 3,
                'complaint_action_id' => 1
            ]);

            ComplaintActionType::create([
                'complaint_type_id' => 13,
                'complaint_action_id' => 1
            ]);

            ComplaintActionType::create([
                'complaint_type_id' => 14,
                'complaint_action_id' => 1
            ]);

            ComplaintActionType::create([
                'complaint_type_id' => 9,
                'complaint_action_id' => 1
            ]);

             ComplaintActionType::create([
                'complaint_type_id' => 15,
                'complaint_action_id' => 1
            ]);

            ComplaintActionType::create([
                'complaint_type_id' => 2,
                'complaint_action_id' => 1
            ]);

            ComplaintActionType::create([
                'complaint_type_id' => 16,
                'complaint_action_id' => 1
            ]);

             ComplaintActionType::create([
                'complaint_type_id' => 17,
                'complaint_action_id' => 1
            ]);

       ComplaintAction::create([
            'id' => 2,
            'action' => 'Did the nurse visit patient to address issue?'
        ]);

            ComplaintActionType::create([
                'complaint_type_id' => 3,
                'complaint_action_id' => 2
            ]);

            ComplaintActionType::create([
                'complaint_type_id' => 13,
                'complaint_action_id' => 2
            ]);

            ComplaintActionType::create([
                'complaint_type_id' => 14,
                'complaint_action_id' => 2
            ]);

            ComplaintActionType::create([
                'complaint_type_id' => 9,
                'complaint_action_id' => 2
            ]);

             ComplaintActionType::create([
                'complaint_type_id' => 15,
                'complaint_action_id' => 2
            ]);

            ComplaintActionType::create([
                'complaint_type_id' => 2,
                'complaint_action_id' => 2
            ]);

             ComplaintActionType::create([
                'complaint_type_id' => 19,
                'complaint_action_id' => 2
            ]);
            ComplaintActionType::create([
                'complaint_type_id' => 20,
                'complaint_action_id' => 2
            ]);
            ComplaintActionType::create([
                'complaint_type_id' => 21,
                'complaint_action_id' => 2
            ]);

             ComplaintActionType::create([
                'complaint_type_id' => 22,
                'complaint_action_id' => 2
            ]);



        ComplaintAction::create([
            'id' => 3,
            'action' => 'Has the worker been removed from the case?'
        ]);

            ComplaintActionType::create([
                'complaint_type_id' => 3,
                'complaint_action_id' => 3
            ]);

            ComplaintActionType::create([
                'complaint_type_id' => 13,
                'complaint_action_id' => 3
            ]);

            ComplaintActionType::create([
                'complaint_type_id' => 14,
                'complaint_action_id' => 3
            ]);

            ComplaintActionType::create([
                'complaint_type_id' => 9,
                'complaint_action_id' => 3
            ]);

             ComplaintActionType::create([
                'complaint_type_id' => 15,
                'complaint_action_id' => 3
            ]);

            ComplaintActionType::create([
                'complaint_type_id' => 2,
                'complaint_action_id' => 3
            ]);

               ComplaintActionType::create([
                'complaint_type_id' => 19,
                'complaint_action_id' => 3
            ]);
            ComplaintActionType::create([
                'complaint_type_id' => 20,
                'complaint_action_id' => 2
            ]);
            ComplaintActionType::create([
                'complaint_type_id' => 21,
                'complaint_action_id' => 3
            ]);

             ComplaintActionType::create([
                'complaint_type_id' => 22,
                'complaint_action_id' => 3
            ]);


      ComplaintAction::create([
            'id' => 4,
            'action' => 'Has the CTU being called with the resolution?'
        ]);

            ComplaintActionType::create([
                'complaint_type_id' => 3,
                'complaint_action_id' => 4
            ]);

            ComplaintActionType::create([
                'complaint_type_id' => 13,
                'complaint_action_id' => 4
            ]);

            ComplaintActionType::create([
                'complaint_type_id' => 14,
                'complaint_action_id' => 4
            ]);

            ComplaintActionType::create([
                'complaint_type_id' => 9,
                'complaint_action_id' => 4
            ]);

             ComplaintActionType::create([
                'complaint_type_id' => 15,
                'complaint_action_id' => 4
            ]);

            ComplaintActionType::create([
                'complaint_type_id' => 2,
                'complaint_action_id' => 4
            ]);


             ComplaintActionType::create([
                'complaint_type_id' => 17,
                'complaint_action_id' => 4
             ]);

             ComplaintActionType::create([
                'complaint_type_id' => 18,
                'complaint_action_id' => 4
             ]);

        ComplaintAction::create([
            'id' => 5,
            'action' => 'Has all forms been completed?'
        ]);

            ComplaintActionType::create([
                'complaint_type_id' => 3,
                'complaint_action_id' => 5
            ]);

            ComplaintActionType::create([
                'complaint_type_id' => 13,
                'complaint_action_id' => 5
            ]);

            ComplaintActionType::create([
                'complaint_type_id' => 14,
                'complaint_action_id' => 5
            ]);

            ComplaintActionType::create([
                'complaint_type_id' => 9,
                'complaint_action_id' => 5
            ]);

             ComplaintActionType::create([
                'complaint_type_id' => 15,
                'complaint_action_id' => 5
            ]);

            ComplaintActionType::create([
                'complaint_type_id' => 2,
                'complaint_action_id' => 5
            ]);

              ComplaintActionType::create([
                'complaint_type_id' => 17,
                'complaint_action_id' => 5
             ]);

             ComplaintActionType::create([
                'complaint_type_id' => 18,
                'complaint_action_id' => 5
             ]);

            ComplaintActionType::create([
                'complaint_type_id' => 19,
                'complaint_action_id' => 5
             ]);

             ComplaintActionType::create([
                'complaint_type_id' => 20,
                'complaint_action_id' => 5
             ]);

             ComplaintActionType::create([
                'complaint_type_id' => 21,
                'complaint_action_id' => 5
             ]);

              ComplaintActionType::create([
                'complaint_type_id' => 22,
                'complaint_action_id' => 5
             ]);

        ComplaintAction::create([
            'id' => 6,
            'action' => 'Were the forms delivered?'
        ]);

            ComplaintActionType::create([
                'complaint_type_id' => 3,
                'complaint_action_id' => 6
            ]);

            ComplaintActionType::create([
                'complaint_type_id' => 13,
                'complaint_action_id' => 6
            ]);

            ComplaintActionType::create([
                'complaint_type_id' => 14,
                'complaint_action_id' => 6
            ]);

            ComplaintActionType::create([
                'complaint_type_id' => 9,
                'complaint_action_id' => 6
            ]);

             ComplaintActionType::create([
                'complaint_type_id' => 15,
                'complaint_action_id' => 6
            ]);

            ComplaintActionType::create([
                'complaint_type_id' => 2,
                'complaint_action_id' => 6
            ]);

              ComplaintActionType::create([
                'complaint_type_id' => 17,
                'complaint_action_id' => 6
             ]);

             ComplaintActionType::create([
                'complaint_type_id' => 18,
                'complaint_action_id' => 6
             ]);


        ComplaintAction::create([
            'id' => 7,
            'action' => 'Was the client urged to notify police?'
        ]);

            ComplaintActionType::create([
                'complaint_type_id' => 3,
                'complaint_action_id' => 7
            ]);

            ComplaintActionType::create([
                'complaint_type_id' => 13,
                'complaint_action_id' => 7
            ]);

            ComplaintActionType::create([
                'complaint_type_id' => 14,
                'complaint_action_id' => 7
            ]);

            ComplaintActionType::create([
                'complaint_type_id' => 9,
                'complaint_action_id' => 7
            ]);

             ComplaintActionType::create([
                'complaint_type_id' => 15,
                'complaint_action_id' => 7
            ]);

            ComplaintActionType::create([
                'complaint_type_id' => 2,
                'complaint_action_id' => 7
            ]);

         ComplaintAction::create([
            'id' => 8,
            'action' => 'Was the patient visited by nurse?'
         ]);
             ComplaintActionType::create([
                'complaint_type_id' => 16,
                'complaint_action_id' => 8
            ]);

         ComplaintAction::create([
            'id' => 9,
            'action' => 'Was the worker removed immediately?'
         ]);
             ComplaintActionType::create([
                'complaint_type_id' => 16,
                'complaint_action_id' => 9
             ]);

        ComplaintAction::create([
            'id' => 10,
            'action' => 'Was CTU notified of the resolution?'
         ]);
             ComplaintActionType::create([
                'complaint_type_id' => 16,
                'complaint_action_id' => 10
             ]);

         ComplaintAction::create([
            'id' => 11,
            'action' => 'Has all forms been completed?'
         ]);
             ComplaintActionType::create([
                'complaint_type_id' => 16,
                'complaint_action_id' => 11
             ]);

         ComplaintAction::create([
            'id' => 12,
            'action' => 'Were the forms delivered?'
         ]);
             
             ComplaintActionType::create([
                'complaint_type_id' => 16,
                'complaint_action_id' => 12
             ]);

          ComplaintAction::create([
            'id' => 13,
            'action' => 'Was the client urged to notify police?'
         ]);
             
             ComplaintActionType::create([
                'complaint_type_id' => 16,
                'complaint_action_id' => 13
             ]);

         ComplaintAction::create([
            'id' => 14,
            'action' => 'RN Visited for Current Issues?'
         ]);
             
             ComplaintActionType::create([
                'complaint_type_id' => 17,
                'complaint_action_id' => 14
             ]);

             ComplaintActionType::create([
                'complaint_type_id' => 18,
                'complaint_action_id' => 14
             ]);

        ComplaintAction::create([
            'id' => 15,
            'action' => 'HHA removed?'
         ]);
             
             ComplaintActionType::create([
                'complaint_type_id' => 17,
                'complaint_action_id' => 15
             ]);

             ComplaintActionType::create([
                'complaint_type_id' => 18,
                'complaint_action_id' => 15
             ]);
        
        ComplaintAction::create([
            'id' => 16,
            'action' => 'Report to CTU?'
         ]);   
             ComplaintActionType::create([
                'complaint_type_id' => 19,
                'complaint_action_id' => 16
             ]);

             ComplaintActionType::create([
                'complaint_type_id' => 20,
                'complaint_action_id' => 16
             ]);

             ComplaintActionType::create([
                'complaint_type_id' => 21,
                'complaint_action_id' => 16
             ]);

              ComplaintActionType::create([
                'complaint_type_id' => 22,
                'complaint_action_id' => 16
             ]);



    }
}
