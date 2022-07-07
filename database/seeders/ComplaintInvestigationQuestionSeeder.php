<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\ComplaintInvestigationQuestion;
use App\Models\ComplaintInvestigationQuestionRole;
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
            'type_id' => 1,
            'question' => 'Was the timesheet reviewed to determine if the employee is (or was) absent',
            'response_type' => 'select_field'
        ]);
                ComplaintTypeQuestion::create([
                    'complaint_type_id' => 15,
                    'complaint_question_id' => 1
                ]);

                ComplaintInvestigationQuestionRole::create([
                    'complaint_investigation_question_id' => 1,
                    'role_id' => 4
                ]);


        ComplaintInvestigationQuestion::create([
            'id' => 2,
            'type_id' => 1,
            'question' => 'Was a replacement worker assigned?',
            'response_type' => 'select_field'
        ]);

               ComplaintTypeQuestion::create([
                    'complaint_type_id' => 15,
                    'complaint_question_id' => 2
                ]);


                ComplaintInvestigationQuestionRole::create([
                    'complaint_investigation_question_id' => 2,
                    'role_id' => 4
                ]);

        ComplaintInvestigationQuestion::create([
            'id' => 3,
            'type_id' => 1,
            'question' => 'Was the agency notified that the home care worker was absent?',
            'response_type' => 'select_field'
        ]);
               ComplaintTypeQuestion::create([
                    'complaint_type_id' => 15,
                    'complaint_question_id' => 3
                ]);


                ComplaintInvestigationQuestionRole::create([
                    'complaint_investigation_question_id' => 3,
                    'role_id' => 4
                ]);

        ComplaintInvestigationQuestion::create([
            'id' => 4,
            'type_id' => 1,
            'question' => 'Was there a report of client injury due to absence?',
            'response_type' => 'select_field'
        ]);

               ComplaintTypeQuestion::create([
                    'complaint_type_id' => 15,
                    'complaint_question_id' => 4
                ]);


                ComplaintInvestigationQuestionRole::create([
                    'complaint_investigation_question_id' => 4,
                    'role_id' => 4
                ]);

        ComplaintInvestigationQuestion::create([
            'id' => 5,
            'type_id' => 1,
            'question' => 'Was the alleged stolen item in possession of the client during the worker shift?',
            'response_type' => 'select_field'
        ]);

               ComplaintTypeQuestion::create([
                    'complaint_type_id' => 2,
                    'complaint_question_id' => 5
                ]);

                 ComplaintInvestigationQuestionRole::create([
                    'complaint_investigation_question_id' => 5,
                    'role_id' => 4
                ]);

        ComplaintInvestigationQuestion::create([
            'id' => 6,
            'type_id' => 1,
            'question' => 'Has an adequate search been conducted to ensure that that item was missing?',
            'response_type' => 'select_field'
        ]);

               ComplaintTypeQuestion::create([
                    'complaint_type_id' => 2,
                    'complaint_question_id' => 6
                ]);

                 ComplaintInvestigationQuestionRole::create([
                    'complaint_investigation_question_id' => 6,
                    'role_id' => 4
                ]);

      ComplaintInvestigationQuestion::create([
            'id' => 7,
            'type_id' => 1,
            'question' => 'Were the client and the worker the only ones at the premise of the alleged theft?',
            'response_type' => 'select_field'
        ]);

               ComplaintTypeQuestion::create([
                    'complaint_type_id' => 2,
                    'complaint_question_id' => 7
                ]);

                 ComplaintInvestigationQuestionRole::create([
                    'complaint_investigation_question_id' => 7,
                    'role_id' => 4
                ]);

     // Nurse Investigation Report
        ComplaintInvestigationQuestion::create([
            'id' => 8,
            'type_id' => 3,
            'question' => 'Does the employee file show history of prior or similar accusations?',
             'response_type' => 'select_field'
        ]);

                 ComplaintTypeQuestion::create([
                    'complaint_type_id' => 2,
                    'complaint_question_id' => 8
                ]);

                  ComplaintTypeQuestion::create([
                    'complaint_type_id' => 15,
                    'complaint_question_id' => 8
                ]);

                 ComplaintInvestigationQuestionRole::create([
                    'complaint_investigation_question_id' => 8,
                    'role_id' => 6
                ]);

         ComplaintInvestigationQuestion::create([
            'id' => 10,
            'type_id' => 3,
            'question' => 'File Examination Date',
             'response_type' => 'clock'
        ]);

                 ComplaintTypeQuestion::create([
                    'complaint_type_id' => 2,
                    'complaint_question_id' => 10
                ]);

                  ComplaintTypeQuestion::create([
                    'complaint_type_id' => 15,
                    'complaint_question_id' => 10
                ]);

                 ComplaintInvestigationQuestionRole::create([
                    'complaint_investigation_question_id' => 10,
                    'role_id' => 6
                ]);


         ComplaintInvestigationQuestion::create([
            'id' => 21,
            'type_id' => 3,
            'question' => 'Does the client file show history of prior or similar complaints?',
             'response_type' => 'clock'
         ]);

                 ComplaintTypeQuestion::create([
                    'complaint_type_id' => 2,
                    'complaint_question_id' => 21
                ]);

                  ComplaintTypeQuestion::create([
                    'complaint_type_id' => 15,
                    'complaint_question_id' => 21
                ]);

                 ComplaintInvestigationQuestionRole::create([
                    'complaint_investigation_question_id' => 21,
                    'role_id' => 6
                ]);




         ComplaintInvestigationQuestion::create([
            'id' => 11,
            'type_id' => 3,
            'question' => 'Did the incident results in a risk to the client?',
             'response_type' => 'select_field'
         ]);

                 ComplaintTypeQuestion::create([
                    'complaint_type_id' => 2,
                    'complaint_question_id' => 11
                ]);

                  ComplaintTypeQuestion::create([
                    'complaint_type_id' => 15,
                    'complaint_question_id' => 11
                ]);

                 ComplaintInvestigationQuestionRole::create([
                    'complaint_investigation_question_id' => 11,
                    'role_id' => 6
                ]);

         ComplaintInvestigationQuestion::create([
            'id' => 12,
            'type_id' => 3,
            'question' => 'Did the client see a medical doctor?',
             'response_type' => 'select_field'
         ]);

                 ComplaintTypeQuestion::create([
                    'complaint_type_id' => 2,
                    'complaint_question_id' => 12
                ]);

                  ComplaintTypeQuestion::create([
                    'complaint_type_id' => 15,
                    'complaint_question_id' => 12
                ]);

                 ComplaintInvestigationQuestionRole::create([
                    'complaint_investigation_question_id' => 12,
                    'role_id' => 6
                ]);


        ComplaintInvestigationQuestion::create([
            'id' => 13,
            'type_id' => 2,
            'question' => 'Was a home visit required or necessary?',
             'response_type' => 'select_field'
         ]);

                 ComplaintTypeQuestion::create([
                    'complaint_type_id' => 2,
                    'complaint_question_id' => 13
                ]);

                  ComplaintTypeQuestion::create([
                    'complaint_type_id' => 15,
                    'complaint_question_id' => 13
                ]);

                 ComplaintInvestigationQuestionRole::create([
                    'complaint_investigation_question_id' => 13,
                    'role_id' => 6
                ]);

         ComplaintInvestigationQuestion::create([
            'id' => 14,
            'type_id' => 2,
            'question' => 'Did the nurse complete a home visit?',
             'response_type' => 'select_field'
         ]);

                 ComplaintTypeQuestion::create([
                    'complaint_type_id' => 2,
                    'complaint_question_id' => 14
                ]);

                  ComplaintTypeQuestion::create([
                    'complaint_type_id' => 15,
                    'complaint_question_id' => 14
                ]);

                 ComplaintInvestigationQuestionRole::create([
                    'complaint_investigation_question_id' => 14,
                    'role_id' => 6
                ]);

          ComplaintInvestigationQuestion::create([
            'id' => 15,
            'type_id' => 2,
            'question' => 'Did the nurse examine the patient’s injury?',
             'response_type' => 'select_field'
         ]);

                 ComplaintTypeQuestion::create([
                    'complaint_type_id' => 2,
                    'complaint_question_id' => 15
                ]);

                  ComplaintTypeQuestion::create([
                    'complaint_type_id' => 15,
                    'complaint_question_id' => 15
                ]);

                 ComplaintInvestigationQuestionRole::create([
                    'complaint_investigation_question_id' => 15,
                    'role_id' => 6
                ]);

            ComplaintInvestigationQuestion::create([
                'id' => 16,
                'type_id' => 2,
                'question' => 'What was the nurse’s conclusion about the injury? - Injury',
                 'response_type' => 'select_field'
             ]);

                 ComplaintTypeQuestion::create([
                    'complaint_type_id' => 2,
                    'complaint_question_id' => 16
                ]);

                  ComplaintTypeQuestion::create([
                    'complaint_type_id' => 15,
                    'complaint_question_id' => 16
                ]);

                 ComplaintInvestigationQuestionRole::create([
                    'complaint_investigation_question_id' => 16,
                    'role_id' => 6
                ]);


            ComplaintInvestigationQuestion::create([
                'id' => 17,
                'type_id' => 2,
                'question' => 'Does the injury require the attention of a physician? - Injury',
                 'response_type' => 'select_field'
             ]);

                 ComplaintTypeQuestion::create([
                    'complaint_type_id' => 2,
                    'complaint_question_id' => 17
                ]);

                  ComplaintTypeQuestion::create([
                    'complaint_type_id' => 15,
                    'complaint_question_id' => 17
                ]);

                 ComplaintInvestigationQuestionRole::create([
                    'complaint_investigation_question_id' => 17,
                    'role_id' => 6
                ]);

               ComplaintInvestigationQuestion::create([
                    'id' => 18,
                    'type_id' => 2,
                    'question' => 'Was the medical release form signed by the client or representative?',
                     'response_type' => 'select_field'
                 ]);

                     ComplaintTypeQuestion::create([
                        'complaint_type_id' => 2,
                        'complaint_question_id' => 18
                    ]);

                      ComplaintTypeQuestion::create([
                        'complaint_type_id' => 15,
                        'complaint_question_id' => 18
                    ]);

                     ComplaintInvestigationQuestionRole::create([
                        'complaint_investigation_question_id' => 18,
                        'role_id' => 6
                    ]);


               ComplaintInvestigationQuestion::create([
                    'id' => 19,
                    'type_id' => 2,
                    'question' => 'Was the police contacted?',
                     'response_type' => 'select_field'
                 ]);

                     ComplaintTypeQuestion::create([
                        'complaint_type_id' => 2,
                        'complaint_question_id' => 19
                    ]);

                      ComplaintTypeQuestion::create([
                        'complaint_type_id' => 15,
                        'complaint_question_id' => 19
                    ]);

                     ComplaintInvestigationQuestionRole::create([
                        'complaint_investigation_question_id' => 19,
                        'role_id' => 6
                    ]);

                 ComplaintInvestigationQuestion::create([
                    'id' => 20,
                    'type_id' => 2,
                    'question' => 'Did you review the current care plan?',
                     'response_type' => 'select_field'
                 ]);

                     ComplaintTypeQuestion::create([
                        'complaint_type_id' => 2,
                        'complaint_question_id' => 20
                    ]);

                      ComplaintTypeQuestion::create([
                        'complaint_type_id' => 15,
                        'complaint_question_id' => 20
                    ]);

                     ComplaintInvestigationQuestionRole::create([
                        'complaint_investigation_question_id' => 20,
                        'role_id' => 6
                    ]);


    }
}
