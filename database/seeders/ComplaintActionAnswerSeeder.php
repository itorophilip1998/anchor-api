<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ComplaintActionAnswer;
use App\Models\AnswerAction;

class ComplaintActionAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            ComplaintActionAnswer::create([
                'action_id' => 1,
                'action_answer' => 'Yes - Immediately on Receipt of Complaint(clock)' 
            ]);

            ComplaintActionAnswer::create([
                'action_id' => 1,
                'action_answer' => 'Yes - Days after Receipt of Complaint (clock)' 
            ]);

            ComplaintActionAnswer::create([
                'action_id' => 1,
                'action_answer' => 'No' 
            ]);

           
            ComplaintActionAnswer::create([
                'action_id' => 2,
                'action_answer' => 'Yes - Within 24 hours' 
            ]);

            ComplaintActionAnswer::create([
                'action_id' => 2,
                'action_answer' => 'Yes - After 24 hours' 
            ]);

            ComplaintActionAnswer::create([
                'action_id' => 2,
                'action_answer' => 'No' 
            ]);

            

            ComplaintActionAnswer::create([
                'action_id' => 3,
                'action_answer' => 'Yes - Immediately' 
            ]);

            ComplaintActionAnswer::create([
                'action_id' => 3,
                'action_answer' => 'No' 
            ]);


            
             ComplaintActionAnswer::create([
                'action_id' => 4,
                'action_answer' => 'Yes - Within 24 hours' 
            ]);

            ComplaintActionAnswer::create([
                'action_id' => 4,
                'action_answer' => 'Yes - After 24 hours' 
            ]);

            ComplaintActionAnswer::create([
                'action_id' => 4,
                'action_answer' => 'No' 
            ]);


            ComplaintActionAnswer::create([
                'action_id' => 5,
                'action_answer' => 'Yes – within 72 hours' 
            ]);

            ComplaintActionAnswer::create([
                'action_id' => 5,
                'action_answer' => 'Yes – after 72 hours'            
            ]);

            ComplaintActionAnswer::create([
                'action_id' => 5,
                'action_answer' => 'No' 
            ]);


            ComplaintActionAnswer::create([
                'action_id' => 6,
                'action_answer' => 'Yes - CTU picked up form' 
            ]);

            ComplaintActionAnswer::create([
                'action_id' => 6,
                'action_answer' => 'Yes – Agency delivered from to CTU'            
            ]);

            ComplaintActionAnswer::create([
                'action_id' => 6,
                'action_answer' => 'No' 
            ]);

            ComplaintActionAnswer::create([
                'action_id' => 7,
                'action_answer' => 'Yes' 
            ]);

            ComplaintActionAnswer::create([
                'action_id' => 7,
                'action_answer' => 'Yes'            
            ]);

            ComplaintActionAnswer::create([
                'action_id' => 7,
                'action_answer' => 'Not Applicable' 
            ]);

           ComplaintActionAnswer::create([
                'action_id' => 8,
                'action_answer' => 'Yes (date)' 
            ]);

            ComplaintActionAnswer::create([
                'action_id' => 8,
                'action_answer' => 'No'            
            ]);

         
    }
}
