<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserStatusSeeder::class);
        $this->call(UserDetailsSeeder::class);
        $this->call(IncidentTypeSeeder::class);
        $this->call(IncidentTypeCategorySeeder::class);
        $this->call(IncidentLocationSeeder::class);
        $this->call(InjurySeeder::class);
        $this->call(ReasonCategorySeeder::class);
        $this->call(ClinicianRecommendationSeeder::class);
        $this->call(InvestigationActivitySeeder::class);
        $this->call(InvestigationQuestionSeeder::class);
        $this->call(ReasonSeeder::class);
        $this->call(ActionSeeder::class);
        $this->call(TriggerTypeSeeder::class);
    }
}
