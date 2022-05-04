<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TriggerType;
use App\Models\Trigger;

class TriggerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {     
      TriggerType::create(['id' => 1, 'name' => 'activity']);
      TriggerType::create(['id' => 2, 'name' => 'Follow-up']);
      TriggerType::create(['id' => 3, 'name' => 'recommendation']);


      Trigger::create(['trigger_type_id' => 1, 'reason_id' => 14]);
      Trigger::create(['trigger_type_id' => 2, 'reason_id' => 14]);
      Trigger::create(['trigger_type_id' => 3, 'reason_id' => 14]);

      Trigger::create(['trigger_type_id' => 1, 'reason_id' => 20]);
      Trigger::create(['trigger_type_id' => 2, 'reason_id' => 20]);
      Trigger::create(['trigger_type_id' => 3, 'reason_id' => 20]);

    }
}
