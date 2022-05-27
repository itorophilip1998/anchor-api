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
            'category' => 'Internal Investigation',
            'question' => 'Was the timesheet reviewed to determine if the employee is (or was) absent',
            'response_type' => 'select_field'
        ]);
                ComplaintTypeQuestion::create([
                    'complaint_type_id' => 15,
                    'complaint_question_id' => 1
                ]);

        ComplaintInvestigationQuestion::create([
            'id' => 2,
            'category' => 'Internal Investigation',
            'question' => 'Was a replacement worker assigned?',
            'response_type' => 'select_field'
        ]);

               ComplaintTypeQuestion::create([
                    'complaint_type_id' => 15,
                    'complaint_question_id' => 2
                ]);

        ComplaintInvestigationQuestion::create([
            'id' => 3,
            'category' => 'Internal Investigation',
            'question' => 'Was the agency notified that the home care worker was absent?',
            'response_type' => 'select_field'
        ]);
               ComplaintTypeQuestion::create([
                    'complaint_type_id' => 15,
                    'complaint_question_id' => 3
                ]);

        ComplaintInvestigationQuestion::create([
            'id' => 4,
            'category' => 'Internal Investigation',
            'question' => 'Was there a report of client injury due to absence?',
            'response_type' => 'select_field'
        ]);

               ComplaintTypeQuestion::create([
                    'complaint_type_id' => 15,
                    'complaint_question_id' => 4
                ]);

        ComplaintInvestigationQuestion::create([
            'id' => 5,
            'category' => 'Internal Investigation',
            'question' => 'Was the alleged stolen item in possession of the client during the worker shift?',
            'response_type' => 'select_field'
        ]);

               ComplaintTypeQuestion::create([
                    'complaint_type_id' => 2,
                    'complaint_question_id' => 5
                ]);

        ComplaintInvestigationQuestion::create([
            'id' => 6,
            'category' => 'Internal Investigation',
            'question' => 'Has an adequate search been conducted to ensure that that item was missing?',
            'response_type' => 'select_field'
        ]);

               ComplaintTypeQuestion::create([
                    'complaint_type_id' => 2,
                    'complaint_question_id' => 6
                ]);

      ComplaintInvestigationQuestion::create([
            'id' => 7,
            'category' => 'Internal Investigation',
            'question' => 'Were the client and the worker the only ones at the premise of the alleged theft?',
            'response_type' => 'select_field'
        ]);

               ComplaintTypeQuestion::create([
                    'complaint_type_id' => 2,
                    'complaint_question_id' => 7
                ]);



    }
}
