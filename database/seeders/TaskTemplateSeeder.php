<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\TaskTemplate;

class TaskTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clinical
         TaskTemplate::create([
            'title' => 'Initial Assessment',
            'task_category_id' => 1,
            'task_component_id' => 1
         ]);

         TaskTemplate::create([
            'title' => 'RN Re-Assessment',
            'task_category_id' => 1,
            'task_component_id' => 1
         ]);

         TaskTemplate::create([
            'title' => 'Care Plan Management',
            'task_category_id' => 1,
            'task_component_id' => 1
         ]);

         TaskTemplate::create([
            'title' => 'Home Care Worker Competency',
            'task_category_id' => 1,
            'task_component_id' => 1
         ]);

         TaskTemplate::create([
            'title' => 'Wellness Assessment',
            'task_category_id' => 1,
            'task_component_id' => 1
         ]);

         TaskTemplate::create([
            'title' => 'General Administrative Tasks',
            'task_category_id' => 1,
            'task_component_id' => 1
         ]);

         TaskTemplate::create([
            'title' => 'Clinical Chart Audits ',
            'task_category_id' => 1,
            'task_component_id' => 1
         ]);

         TaskTemplate::create([
            'title' => 'Nurse Evaluation Form',
            'task_category_id' => 1,
            'task_component_id' => 1
         ]);
         // End Clinical
         

         //  Case Coordinator     
         TaskTemplate::create([
            'title' => 'Difficult to Serve Case Management ',
            'task_category_id' => 2,
            'task_component_id' => 1
         ]);

         TaskTemplate::create([
            'title' => 'HCW Specific Orientation',
            'task_category_id' => 2,
            'task_component_id' => 1
         ]);

        TaskTemplate::create([
            'title' => 'HCW Specific Orientation',
            'task_category_id' => 2,
            'task_component_id' => 1
         ]);

         TaskTemplate::create([
            'title' => 'Call Maintenance/EVV Management (Daily)',
            'task_category_id' => 2,
            'task_component_id' => 1
         ]);


         TaskTemplate::create([
            'title' => 'Pre-Billing Daily (Visit that needs to be corrected – overlapping – split shift – aides, no authorization—over scheduling – run recent report)',
            'task_category_id' => 2,
            'task_component_id' => 1
         ]);

         TaskTemplate::create([
            'title' => 'Home Care Worker Follow-up',
            'task_category_id' => 2,
            'task_component_id' => 1
         ]);

         TaskTemplate::create([
            'title' => 'Client Follow-up',
            'task_category_id' => 2,
            'task_component_id' => 1
         ]);


         TaskTemplate::create([
            'title' => 'Disciplinary Action',
            'task_category_id' => 2,
            'task_component_id' => 1
         ]);

         TaskTemplate::create([
            'title' => 'Adhoc Case Scheduling ',
            'task_category_id' => 2,
            'task_component_id' => 1
         ]);

         TaskTemplate::create([
            'title' => 'Paper Time Sheet Generation',
            'task_category_id' => 2,
            'task_component_id' => 1
         ]);

         TaskTemplate::create([
            'title' => 'Evaluation of Utilization (Weekly)',
            'task_category_id' => 2,
            'task_component_id' => 1
         ]);

          TaskTemplate::create([
            'title' => 'Problem Management',
            'task_category_id' => 2,
            'task_component_id' => 1
         ]);

         TaskTemplate::create([
            'title' => 'Technology Training',
            'task_category_id' => 2,
            'task_component_id' => 1
         ]);


         // Intake Cooridnator
          TaskTemplate::create([
            'title' => 'Authorization Management ',
            'task_category_id' => 3,
            'task_component_id' => 1
          ]);

          TaskTemplate::create([
            'title' => 'Eligibility Management ',
            'task_category_id' => 3,
            'task_component_id' => 1
          ]);

          TaskTemplate::create([
            'title' => 'Incidents Management ',
            'task_category_id' => 3,
            'task_component_id' => 1
          ]);

          TaskTemplate::create([
            'title' => 'Complaint Manage',
            'task_category_id' => 3,
            'task_component_id' => 1
          ]);

          TaskTemplate::create([
            'title' => 'Provide to Clerical – Clerical ',
            'task_category_id' => 3,
            'task_component_id' => 1
          ]);

          TaskTemplate::create([
            'title' => 'HIP – Send in the M27 – Authorization depends on the M11Q – make sure 27 ',
            'task_category_id' => 3,
            'task_component_id' => 1
          ]);

           TaskTemplate::create([
            'title' => 'LTC web log complaint from client',
            'task_category_id' => 3,
            'task_component_id' => 1
          ]);

           TaskTemplate::create([
            'title' => 'Notification for complaint registered for a client ',
            'task_category_id' => 3,
            'task_component_id' => 1
          ]);

          TaskTemplate::create([
            'title' => 'Receipt of New Case through LTC web',
            'task_category_id' => 3,
            'task_component_id' => 1
          ]);

          // Billing & Collectiong Management
          TaskTemplate::create([
            'title' => 'Bill Submission',
            'task_category_id' => 4,
            'task_component_id' => 1
          ]);

          TaskTemplate::create([
            'title' => 'Collection Management',
            'task_category_id' => 4,
            'task_component_id' => 1
          ]);

          TaskTemplate::create([
            'title' => 'Bill Resolution ',
            'task_category_id' => 4,
            'task_component_id' => 1
          ]);

          // Home Care Workers 
          TaskTemplate::create([
            'title' => 'Vacation/Time-off Request',
            'task_category_id' => 4,
            'task_component_id' => 1
          ]);

          TaskTemplate::create([
            'title' => 'Case Coordinator Evaluation ',
            'task_category_id' => 4,
            'task_component_id' => 1
          ]);


          TaskTemplate::create([
            'title' => 'Nurse Evaluation ',
            'task_category_id' => 4,
            'task_component_id' => 1
          ]);


          TaskTemplate::create([
            'title' => 'Complaint Submission',
            'task_category_id' => 4,
            'task_component_id' => 1
          ]);

           TaskTemplate::create([
            'title' => 'Incident Submission',
            'task_category_id' => 4,
            'task_component_id' => 1
          ]);


           TaskTemplate::create([
            'title' => 'Refer a client',
            'task_category_id' => 4,
            'task_component_id' => 1
          ]);

          TaskTemplate::create([
            'title' => 'Refer a Home Care Worker',
            'task_category_id' => 4,
            'task_component_id' => 1
          ]);

          TaskTemplate::create([
            'title' => 'Absent Restriction – Takes the Aide out of the schedule for the day - ???',
            'task_category_id' => 4,
            'task_component_id' => 1
          ]);

           TaskTemplate::create([
            'title' => 'Post-Hospitalization Management',
            'task_category_id' => 1,
            'task_component_id' => 2
          ]);


           TaskTemplate::create([
            'title' => 'Change in Condition Management ',
            'task_category_id' => 1,
            'task_component_id' => 2
          ]);

          TaskTemplate::create([
            'title' => 'Complete M-27T on LTC Web – Identical to the Supervisory ',
            'task_category_id' => 1,
            'task_component_id' => 2
          ]);


          TaskTemplate::create([
            'title' => 'Home Care Worker Evaluation',
            'task_category_id' => 2,
            'task_component_id' => 2
          ]);


          TaskTemplate::create([
            'title' => 'Supervisor Evaluation',
            'task_category_id' => 2,
            'task_component_id' => 2
          ]);

          TaskTemplate::create([
            'title' => 'Incident Reporting ',
            'task_category_id' => 3,
            'task_component_id' => 2
          ]);

         TaskTemplate::create([
            'title' => 'Complaint Reporting ',
            'task_category_id' => 3,
            'task_component_id' => 2
          ]);
          
          TaskTemplate::create([
            'title' => 'COVID Daily Survey',
            'task_category_id' => 5,
            'task_component_id' => 2
          ]);

           TaskTemplate::create([
            'title' => 'EVV Utilization',
            'task_category_id' => 5,
            'task_component_id' => 2
          ]);
          
          TaskTemplate::create([
            'title' => 'Case Coordinator Evaluation ',
            'task_category_id' => 5,
            'task_component_id' => 2
          ]);

          TaskTemplate::create([
            'title' => 'Manager Self-Assessment ',
            'task_category_id' => 1,
            'task_component_id' => 3
          ]);

            TaskTemplate::create([
            'title' => 'Supervisor Self-Assessment  ',
            'task_category_id' => 1,
            'task_component_id' => 3
          ]);


         TaskTemplate::create([
            'title' => 'Non-Supervisory Assessment ',
            'task_category_id' => 1,
            'task_component_id' => 3
          ]);

           TaskTemplate::create([
            'title' => 'Home Care Worker Follow-up',
            'task_category_id' => 1,
            'task_component_id' => 4
          ]);

           TaskTemplate::create([
            'title' => 'Follow-up with Case Coordinator',
            'task_category_id' => 1,
            'task_component_id' => 4
          ]);


           TaskTemplate::create([
            'title' => 'Client Follow-up',
            'task_category_id' => 1,
            'task_component_id' => 4
          ]);

          TaskTemplate::create([
            'title' => 'Wellness Visits ',
            'task_category_id' => 1,
            'task_component_id' => 4
          ]);
          


          TaskTemplate::create([
            'title' => 'Home Care Worker Follow-up',
            'task_category_id' => 2,
            'task_component_id' => 4
          ]);


          TaskTemplate::create([
            'title' => 'Client Follow-up',
            'task_category_id' => 2,
            'task_component_id' => 4
          ]);

          TaskTemplate::create([
            'title' => 'Job Satisfaction Survey',
            'task_category_id' => 1,
            'task_component_id' => 5
          ]);

         TaskTemplate::create([
            'title' => 'Job Satisfaction Survey',
            'task_category_id' => 2,
            'task_component_id' => 5
          ]);

         TaskTemplate::create([
            'title' => 'Job Satisfaction Survey',
            'task_category_id' => 3,
            'task_component_id' => 5
          ]);

         TaskTemplate::create([
            'title' => 'Job Satisfaction Survey',
            'task_category_id' => 4,
            'task_component_id' => 5
          ]);

         TaskTemplate::create([
            'title' => 'Job Satisfaction Survey',
            'task_category_id' => 5,
            'task_component_id' => 5
          ]);

         TaskTemplate::create([
            'title' => 'Job Satisfaction Survey',
            'task_category_id' => 6,
            'task_component_id' => 5
          ]);

         TaskTemplate::create([
            'title' => 'Job Satisfaction Survey',
            'task_category_id' => 7,
            'task_component_id' => 5
          ]);

          TaskTemplate::create([
            'title' => 'Customer Satisfaction Survey',
            'task_category_id' => 8,
            'task_component_id' => 5
          ]);

           TaskTemplate::create([
            'title' => 'EVV Utilization',
            'task_category_id' => 1,
            'task_component_id' => 6
          ]);


           TaskTemplate::create([
            'title' => 'Refer a Client ',
            'task_category_id' => 1,
            'task_component_id' => 6
          ]);

           TaskTemplate::create([
            'title' => 'Refer a Home Care Worker ',
            'task_category_id' => 1,
            'task_component_id' => 6
          ]);

         TaskTemplate::create([
            'title' => 'HHAX Mobile App Utilization',
            'task_category_id' => 1,
            'task_component_id' => 6
          ]);

          TaskTemplate::create([
            'title' => 'POC Compliance',
            'task_category_id' => 1,
            'task_component_id' => 6
          ]);

        TaskTemplate::create([
            'title' => 'Disciplinary Actions',
            'task_category_id' => 1,
            'task_component_id' => 6
          ]);

    }
}
