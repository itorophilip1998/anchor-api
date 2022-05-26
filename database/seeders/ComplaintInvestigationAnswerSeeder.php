<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\ComplaintInvestigationAnswer;

class ComplaintInvestigationAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Question: Reason for Lateness
        ComplaintInvestigationAnswer::create([
            'question_id' => 1,
            'answer' => 'Traffic Issue'
        ]);

        ComplaintInvestigationAnswer::create([
            'question_id' => 1,
            'answer' => 'Accident'
        ]);

        ComplaintInvestigationAnswer::create([
            'question_id' => 1,
            'answer' => 'Family Emergency'
        ]);

        // Question: Was a replacement assigned?
        ComplaintInvestigationAnswer::create([
            'question_id' => 2,
            'answer' => 'Yes'
        ]);

        ComplaintInvestigationAnswer::create([
            'question_id' => 2,
            'answer' => 'No'
        ]);

        ComplaintInvestigationAnswer::create([
            'question_id' => 2,
            'answer' => 'Not Applicable'
        ]);

        //Question: Has the worker reported to client site?
        ComplaintInvestigationAnswer::create([
            'question_id' => 3,
            'answer' => 'Yes'
        ]);

        ComplaintInvestigationAnswer::create([
            'question_id' => 3,
            'answer' => 'No'
        ]);

        // Question: List of Task Not Provided Due to Lateness
        ComplaintInvestigationAnswer::create([
            'question_id' => 5,
            'answer' => 'Bathing',
        ]);

        ComplaintInvestigationAnswer::create([
            'question_id' => 5,
            'answer' => 'Cooking',
        ]);

         ComplaintInvestigationAnswer::create([
            'question_id' => 5,
            'answer' => 'Etc.',
        ]);

         // Question: Was the client injured
         ComplaintInvestigationAnswer::create([
            'question_id' => 6,
            'answer' => 'Yes',
         ]);

         ComplaintInvestigationAnswer::create([
            'question_id' => 6,
            'answer' => 'No',
         ]);

         // Question: Did the client go to hospital or emergency room?
        ComplaintInvestigationAnswer::create([
            'question_id' => 7,
            'answer' => 'Yes',
         ]);

         ComplaintInvestigationAnswer::create([
            'question_id' => 7,
            'answer' => 'No',
         ]);

         
         // Question: Does client/their family fault the worker?
        ComplaintInvestigationAnswer::create([
            'question_id' => 8,
            'answer' => 'Yes',
         ]);

         ComplaintInvestigationAnswer::create([
            'question_id' => 8,
            'answer' => 'No',
         ]);

         // Question: Was worker performance consistent with agency standards?
         ComplaintInvestigationAnswer::create([
            'question_id' => 9,
            'answer' => 'Yes',
         ]);

         ComplaintInvestigationAnswer::create([
            'question_id' => 9,
            'answer' => 'No',
         ]);
         //Question: Did the nurse complete a visit?
         ComplaintInvestigationAnswer::create([
            'question_id' => 10,
            'answer' => 'Yes',
         ]);

         ComplaintInvestigationAnswer::create([
            'question_id' => 10,
            'answer' => 'No',
         ]);
         // Question: • Date of the Nurse Visit 
    }
}
