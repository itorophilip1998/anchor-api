<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\TaskFieldTemplate;

class TaskFieldTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        TaskFieldTemplate::create([
            'name' => 'Personal Data'
        ]);

         TaskFieldTemplate::create([
            'name' => 'Demographic'
         ]);

         TaskFieldTemplate::create([
            'name' => 'Proxy'
         ]);

         TaskFieldTemplate::create([
            'name' => 'Provider & Insurance'
         ]);

         TaskFieldTemplate::create([
            'name' => 'Health Management'
         ]);

         TaskFieldTemplate::create([
            'name' => 'Medication Management'
         ]);

         TaskFieldTemplate::create([
            'name' => 'Care Plan Management'
         ]);
        
        TaskFieldTemplate::create([
            'name' => 'Referral Management'
         ]);
    }
}

