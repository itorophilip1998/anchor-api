<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\ComplaintInvestigationQuestion;
use App\Models\ComplaintTypeQuestion;

class ComplaintInvestigationQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        ComplaintInvestigationQuestion::create([
            'id' => 1,
            'question' => 'Reason for Lateness',
            'response_type' => 'select_field'
        ]);

                ComplaintTypeQuestion::create([
                    'complaint_type_id' => 8,
                    'complaint_question_id' => 1
                ]);

                 ComplaintTypeQuestion::create([
                    'complaint_type_id' => 10,
                    'complaint_question_id' => 1
                ]);

        ComplaintInvestigationQuestion::create([
            'id' => 2,
            'question' => 'Was a replacement assigned?',
            'response_type' => 'select_field'
        ]);

                 ComplaintTypeQuestion::create([
                    'complaint_type_id' => 8,
                    'complaint_question_id' => 2
                ]);

                 ComplaintTypeQuestion::create([
                    'complaint_type_id' => 10,
                    'complaint_question_id' => 2
                ]);

        ComplaintInvestigationQuestion::create([
            'id' => 3,
            'question' => 'Has the worker reported to client site?',
            'response_type' => 'select_field'
        ]);
                 ComplaintTypeQuestion::create([
                    'complaint_type_id' => 8,
                    'complaint_question_id' => 3
                ]);

                 ComplaintTypeQuestion::create([
                    'complaint_type_id' => 10,
                    'complaint_question_id' => 3
                ]);

         ComplaintInvestigationQuestion::create([
            'id' => 4,
            'question' => 'Time of Clock-In',
            'response_type' => 'time_field'
        ]);
                 ComplaintTypeQuestion::create([
                    'complaint_type_id' => 8,
                    'complaint_question_id' => 4
                ]);

                 ComplaintTypeQuestion::create([
                    'complaint_type_id' => 10,
                    'complaint_question_id' => 4
                ]);

        ComplaintInvestigationQuestion::create([
            'id' => 5,
            'question' => 'List of Task Not Provided Due to Lateness',
            'response_type' => 'select_field'
        ]);
                 ComplaintTypeQuestion::create([
                    'complaint_type_id' => 8,
                    'complaint_question_id' => 5
                ]);

                 ComplaintTypeQuestion::create([
                    'complaint_type_id' => 10,
                    'complaint_question_id' => 5 
                ]);

       ComplaintInvestigationQuestion::create([
            'id' => 6,
            'question' => 'Was the client injured? ',
            'response_type' => 'select_field'
        ]); 
                 ComplaintTypeQuestion::create([
                    'complaint_type_id' => 4,
                    'complaint_question_id' => 6
                ]);

                 ComplaintTypeQuestion::create([
                    'complaint_type_id' => 5,
                    'complaint_question_id' => 6 
                ]);


       ComplaintInvestigationQuestion::create([
            'id' => 7,
            'question' => 'Did the client go to hospital or emergency room?',
            'response_type' => 'select_field'
        ]);
                ComplaintTypeQuestion::create([
                    'complaint_type_id' => 4,
                    'complaint_question_id' => 7
                ]);

                 ComplaintTypeQuestion::create([
                    'complaint_type_id' => 5,
                    'complaint_question_id' => 7 
                ]);

         ComplaintInvestigationQuestion::create([
            'id' => 8,
            'question' => 'Does client/their family fault the worker?',
            'response_type' => 'select_field'
        ]);
                ComplaintTypeQuestion::create([
                    'complaint_type_id' => 4,
                    'complaint_question_id' => 8
                ]);

                 ComplaintTypeQuestion::create([
                    'complaint_type_id' => 5,
                    'complaint_question_id' => 8 
                ]);

        ComplaintInvestigationQuestion::create([
            'id' => 9,
            'question' => 'Was worker performance consistent with agency standards? ',
            'response_type' => 'select_field'
        ]);
                ComplaintTypeQuestion::create([
                    'complaint_type_id' => 4,
                    'complaint_question_id' => 9
                ]);

                 ComplaintTypeQuestion::create([
                    'complaint_type_id' => 5,
                    'complaint_question_id' => 9 
                ]);

        ComplaintInvestigationQuestion::create([
            'id' => 10,
            'question' => 'Did the nurse complete a visit?',
            'response_type' => 'select_field'
        ]);
                ComplaintTypeQuestion::create([
                    'complaint_type_id' => 4,
                    'complaint_question_id' => 10
                ]);

                 ComplaintTypeQuestion::create([
                    'complaint_type_id' => 5,
                    'complaint_question_id' => 10
                ]);

        ComplaintInvestigationQuestion::create([
            'id' => 11,
            'question' => 'Date of the Nurse Visit',
            'response_type' => 'date_field'
        ]);
                ComplaintTypeQuestion::create([
                    'complaint_type_id' => 4,
                    'complaint_question_id' => 11
                ]);

                 ComplaintTypeQuestion::create([
                    'complaint_type_id' => 5,
                    'complaint_question_id' => 11
                ]);


        ComplaintInvestigationQuestion::create([
            'id' => 12,
            'question' => 'Was home visit required or necessary?',
            'response_type' => 'true_false_field'
        ]);

                ComplaintTypeQuestion::create([
                    'complaint_type_id' => 2,
                    'complaint_question_id' => 12
                ]);

                 ComplaintTypeQuestion::create([
                    'complaint_type_id' => 9,
                    'complaint_question_id' => 12
                ]);


                 ComplaintTypeQuestion::create([
                    'complaint_type_id' => 13,
                    'complaint_question_id' => 12
                ]);


                 ComplaintTypeQuestion::create([
                    'complaint_type_id' => 14,
                    'complaint_question_id' => 12
                ]);

    }
}
