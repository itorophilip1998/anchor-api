<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ReasonCategory;

class ReasonCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReasonCategory::create(['id' => 1,'name' => 'Clinical']);
        ReasonCategory::create(['id' => 2,'name' => 'Death']);
        ReasonCategory::create(['id' => 3,'name' =>  'Eligibility']);
        ReasonCategory::create(['id' => 4,'name' =>  'Personal']);
        ReasonCategory::create(['id' => 5,'name' =>  'Hospitalization']);
        ReasonCategory::create(['id' => 6,'name' =>  'Post Hospitalization']);
        ReasonCategory::create(['id' => 7,'name' =>  'Falls']);
        ReasonCategory::create(['id' => 8,'name' => 'Other Clinical Changes']);
    }
}

   
