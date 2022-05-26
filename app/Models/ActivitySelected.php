<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\InvestigationActivityResults;
use App\Models\SelectedResults;
use App\Models\SelecteRecommendation;

class ActivitySelected extends Model
{
    use HasFactory;

    protected $with = ['response','selected_result', 'recommendation', 'selected_recommendation']; /// given that relation name is 'room'

    public function result() {
        return $this->hasMany(InvestigationActivityResults::class, 'activity_id');
    }

    public function selected_result() {
          return $this->hasMany(InvestigationActivityResults::class, 'activity_id', 'activity_id');
    }

    public function response() {
        return $this->hasMany(SelectedResults::class, 'activity_id', 'activity_id');
    }

    public function recommendation() {
      return $this->hasMany(ActivityRecommendation::class, 'activity_id', 'activity_id');
   }

   public function selected_recommendation() {
    return $this->hasMany(SelectedRecommendation::class, 'activity_id', 'activity_id');
   }
}
