<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\InvestigationActivityResult;
use App\Models\ActivityRecommendation;
use App\Models\SelectedResults;

class InvestigationActivity extends Model
{
    use HasFactory;

    protected $table = 'investigation_activities';

    public function result() {
        return $this->hasMany(InvestigationActivityResults::class, 'activity_id');   
    }

   public function response() {
        return $this->hasMany(SelectedResults::class, 'activity_id');
   } 

   public function recommendation() {
      return $this->hasMany(ActivityRecommendation::class, 'activity_id');
   }
}
