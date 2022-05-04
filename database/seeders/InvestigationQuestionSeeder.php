<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InvestigationQuestion;
use App\Models\InvestigationQuestionAnswer;

class InvestigationQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InvestigationQuestion::create([
            'id' => 1,
            'incident_type_id' => 1,
            'reason_category_id' => 1,
            'question' => 'What is the reasons for the need for higher level of care?'
        ]);

        InvestigationQuestionAnswer::create([
            'investigation_question_id' => 1,
            'answer' => 'Home care is no longer adequate'
        ]);

         InvestigationQuestionAnswer::create([
            'investigation_question_id' => 1,
            'answer' => 'Not Satistfy with service'
        ]);

        InvestigationQuestionAnswer::create([
            'investigation_question_id' => 1,
            'answer' => 'Complants not resolved timely'
        ]);

        InvestigationQuestionAnswer::create([
            'investigation_question_id' => 1,
            'answer' => 'No longer living in coverage area'
        ]);

        InvestigationQuestionAnswer::create([
            'investigation_question_id' => 1,
            'answer' => 'Other'
        ]);

        InvestigationQuestion::create([
            'id' => 2,
            'incident_type_id' => 1,
            'reason_category_id' => 2,
            'question' => 'What was the reason for death?'
        ]);

        InvestigationQuestionAnswer::create([
            'investigation_question_id' => 2,
            'answer' => 'Stroke'
        ]);

        InvestigationQuestionAnswer::create([
            'investigation_question_id' => 2,
            'answer' => 'Diabetes'
        ]);

        InvestigationQuestionAnswer::create([
            'investigation_question_id' => 2,
            'answer' => 'others'
        ]);

        InvestigationQuestion::create([
            'id' => 3,
            'incident_type_id' => 1,
            'reason_category_id' => 2,
            'question' => 'Was home care worker notified?',
            'response_type' => 'true_false_field'
        ]);


        InvestigationQuestion::create([
            'id' => 4,
            'incident_type_id' => 1,
            'reason_category_id' => 2,
            'question' => 'Was client’s family outreached and condolences expressed?',
            'response_type' => 'true_false_field'
        ]);

        InvestigationQuestion::create([
            'id' => 5,
            'incident_type_id' => 1,
            'reason_category_id' => 2,
            'question' => 'Did agency offer any support to the client’s family?',
            'response_type' => 'true_false_field'
        ]);

        InvestigationQuestion::create([
            'id' => 100,
            'incident_type_id' => 1,
            'reason_category_id' => 2,
            'question' => 'Were there any suspicious of neglect?',
        ]);

         InvestigationQuestionAnswer::create([
            'investigation_question_id' => 100,
            'answer' => 'No, Natural Cause'
        ]);
        //TODO:
        //Trigger a complaint right here 
        InvestigationQuestionAnswer::create([
            'investigation_question_id' => 100,
            'answer' => 'Yes, Suspicion of Neglect'
        ]);
        
        InvestigationQuestionAnswer::create([
            'investigation_question_id' => 100,
            'answer' => 'Not Sure'
        ]);

        InvestigationQuestion::create([
            'id' => 6,
            'incident_type_id' => 1,
            'reason_category_id' => 3,
            'question' => 'Date Client Contacted',
            'response_type' => 'date_field'
        ]);

         InvestigationQuestion::create([
            'id' => 7,
            'incident_type_id' => 1,
            'reason_category_id' => 3,
            'question' => 'Was client or the client’s family reached?',
            'response_type' => 'true_false_field'
        ]);

        InvestigationQuestion::create([
            'id' => 8,
            'incident_type_id' => 1,
            'reason_category_id' => 3,
            'question' => 'Were there more detailed reasons for the discharge?',
            'response_type' => 'multi_select_field'
        ]);

          InvestigationQuestionAnswer::create([
            'investigation_question_id' => 8,
            'answer' => 'Home care is no longer adequate'
          ]);
          InvestigationQuestionAnswer::create([
            'investigation_question_id' => 8,
            'answer' => 'Not satisfied with service'
          ]); 
          InvestigationQuestionAnswer::create([
                'investigation_question_id' => 8,
                'answer' => 'Complaints not resolved timely'
            ]);
          InvestigationQuestionAnswer::create([
                'investigation_question_id' => 8,
                'answer' => 'Desirous to try alternative agency '
           ]);
           InvestigationQuestionAnswer::create([
                'investigation_question_id' => 8,
                'answer' => 'No longer living in coverage area'
            ]);
            InvestigationQuestionAnswer::create([
                'investigation_question_id' => 8,
                'answer' => 'Internal transfer'
            ]);
            InvestigationQuestionAnswer::create([
                'investigation_question_id' => 8,
                'answer' => 'Refuse transfer to another plan'
            ]);
            InvestigationQuestionAnswer::create([
                'investigation_question_id' => 8,
                'answer' => 'No M11Q'
            ]);
            InvestigationQuestionAnswer::create([
                'investigation_question_id' => 8,
                'answer' => 'No Authorization'
            ]);
            InvestigationQuestionAnswer::create([
                'investigation_question_id' => 8,
                'answer' => 'Disenrolled from Insurance Plan'
            ]);
            InvestigationQuestionAnswer::create([
                'investigation_question_id' => 8,
                'answer' => 'Paused for more than 30 days'
            ]);
            InvestigationQuestionAnswer::create([
                'investigation_question_id' => 8,
                'answer' => 'Vacation'
            ]);
            InvestigationQuestionAnswer::create([
                'investigation_question_id' => 8,
                'answer' => 'No reason'
            ]);
             InvestigationQuestionAnswer::create([
                'investigation_question_id' => 8,
                'answer' => 'COVID-19 Related Death'
            ]);
            InvestigationQuestionAnswer::create([
                'investigation_question_id' => 8,
                'answer' => 'Non-COVID-19 Related Death'
            ]);
            InvestigationQuestionAnswer::create([
                'investigation_question_id' => 8,
                'answer' => 'Other'
            ]);

             

            InvestigationQuestion::create([
                'id' => 10,
                'incident_type_id' => 2,
                'reason_category_id' => 6,
                'question' => 'What was the reason for hospitalization?',
                'response_type' => 'multi_select_field'
            ]);

                InvestigationQuestionAnswer::create([
                    'investigation_question_id' => 10,
                    'answer' => 'Deterioration in Patient Condition'
                ]);
               InvestigationQuestionAnswer::create([
                    'investigation_question_id' => 10,
                    'answer' => 'Hospitalization'
                ]);
               InvestigationQuestionAnswer::create([
                    'investigation_question_id' => 10,
                    'answer' => 'Fall'
                ]);
               InvestigationQuestionAnswer::create([
                    'investigation_question_id' => 10,
                    'answer' => 'Death of Patient'
                ]);
               InvestigationQuestionAnswer::create([
                    'investigation_question_id' => 10,
                    'answer' => 'Discharge'
                ]);
               InvestigationQuestionAnswer::create([
                    'investigation_question_id' => 10,
                    'answer' => 'Deterioration in the Patient Living Condition'
                ]);
               InvestigationQuestionAnswer::create([
                    'investigation_question_id' => 10,
                    'answer' => 'Inappropriate Care Plan'
                ]);
               InvestigationQuestionAnswer::create([
                    'investigation_question_id' => 10,
                    'answer' => 'Poor Performance of Worker'
                ]);

                InvestigationQuestion::create([
                    'id' => 11,
                    'incident_type_id' => 2,
                    'reason_category_id' => 6,
                    'question' => 'Client outreached during hospitalization?',
                    'response_type' => 'true_false_field'
                ]);

                InvestigationQuestion::create([
                    'id' => 12,
                    'incident_type_id' => 2,
                    'reason_category_id' => 6,
                    'question' => 'Date of 1st Outreach',
                    'response_type' => 'date_field'
                ]);

                InvestigationQuestion::create([
                    'id' => 13,
                    'incident_type_id' => 2,
                    'reason_category_id' => 6,
                    'question' => 'Date of 2st Outreach',
                    'response_type' => 'date_field'
                ]);

                InvestigationQuestion::create([
                    'id' => 14,
                    'incident_type_id' => 3,
                    'reason_category_id' => 4,
                    'question' => 'Reason fo action',
                ]);

                InvestigationQuestionAnswer::create([
                    'investigation_question_id' => 14,
                    'answer' => 'Poor Performance of Worker'
                ]);

                InvestigationQuestionAnswer::create([
                    'investigation_question_id' => 14,
                    'answer' => 'Holidays – Family in Town'
                ]);
                  InvestigationQuestionAnswer::create([
                    'investigation_question_id' => 14,
                    'answer' => 'COVID-19 Precaution'
                ]);
                  InvestigationQuestionAnswer::create([
                    'investigation_question_id' => 14,
                    'answer' => 'Traveling'
                ]);

                InvestigationQuestion::create([
                    'id' => 15,
                    'incident_type_id' => 3,
                    'reason_category_id' => 4,
                    'question' => 'Expected Return',
                ]);

                  InvestigationQuestionAnswer::create([
                    'investigation_question_id' => 15,
                    'answer' => '7-Days'
                ]);
                  InvestigationQuestionAnswer::create([
                    'investigation_question_id' => 15,
                    'answer' => '14-Days'
                ]);
                  InvestigationQuestionAnswer::create([
                    'investigation_question_id' => 15,
                    'answer' => 'Within 30-days'
                ]);
                  InvestigationQuestionAnswer::create([
                    'investigation_question_id' => 15,
                    'answer' => '31-60 days'
                ]);
                  InvestigationQuestionAnswer::create([
                    'investigation_question_id' => 15,
                    'answer' => 'Over 60 days'
                ]);
                  InvestigationQuestionAnswer::create([
                    'investigation_question_id' => 15,
                    'answer' => 'N/A'
                ]);

                InvestigationQuestion::create([
                    'id' => 16,
                    'incident_type_id' => 3,
                    'reason_category_id' => 4,
                    'question' => 'Actions Required to Get Client Back in Care',
                ]);

                 InvestigationQuestionAnswer::create([
                    'investigation_question_id' => 16,
                    'answer' => 'Provide Caregivers with PPP',
                ]);
                    InvestigationQuestionAnswer::create([
                    'investigation_question_id' => 16,
                    'answer' => 'Follow-up before expiration',
                ]); 
                    InvestigationQuestionAnswer::create([
                    'investigation_question_id' => 16,
                    'answer' => 'Follow-up after ',
                ]);
                    InvestigationQuestionAnswer::create([
                    'investigation_question_id' => 16,
                    'answer' => 'Not applicable ',
                ]); 

                 InvestigationQuestion::create([
                    'id' => 17,
                    'incident_type_id' => 3,
                    'reason_category_id' => 4,
                    'question' => 'Client Return on Expected Return Date',
                    'response_type' => 'true_false_field'
                ]);


    }
}
