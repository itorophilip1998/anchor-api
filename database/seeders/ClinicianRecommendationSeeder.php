<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClinicianRecommendation;



class ClinicianRecommendationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        ClinicianRecommendation::create([
            'recommendation' => 'CHHA/Clinical Intervention'
        ]);
  
        ClinicianRecommendation::create([
            'recommendation' => 'Daily Monitoring'
        ]);
  
        ClinicianRecommendation::create([
            'recommendation' => 'Caregiver to Inform Agency of Changes '
        ]);
  
        ClinicianRecommendation::create([
            'recommendation' => 'Speech Therapy'
        ]);
  
        ClinicianRecommendation::create([
            'recommendation' => 'Occupational Therapy'
        ]);
  
        ClinicianRecommendation::create([
            'recommendation' => 'Physical Therapy'
        ]);
  
        ClinicianRecommendation::create([
            'recommendation' => 'Nutrition Services'
        ]); 
  
        ClinicianRecommendation::create([
            'recommendation' => 'Emergency Room'
        ]); 
  
        ClinicianRecommendation::create([
            'recommendation' => 'Set up Appointment with PCP'
        ]);
  
        ClinicianRecommendation::create([
            'recommendation' => 'Social Services'
        ]); 
  
        ClinicianRecommendation::create([
            'recommendation' => 'Negotiate More Service Hours with MLTC/HRA'
        ]);
  
        ClinicianRecommendation::create([
            'recommendation' => 'Medical Equipment'
        ]);
  
        ClinicianRecommendation::create([
            'recommendation' => 'Home Retrofit'
        ]);
    }
}


  
