<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ComplaintInvestigationAnswer;
use App\Models\InvestigationType;
use App\Models\ComplaintInvestigationQuestionRole;

class ComplaintInvestigationQuestion extends Model
{
    use HasFactory;

    protected $with = ['answer', 'investigation_type', 'investigation_role'];

    public function answer() {
        return $this->hasMany(ComplaintInvestigationAnswer::class,
        'question_id', 'id');
    }

    public function investigation_type() {
       return $this->belongsTo(InvestigationType::class, 'type_id', 'id');
    }

    public function investigation_role() {
        return $this->belongsToMany(Role::class, ComplaintInvestigationQuestionRole::class,
         'complaint_investigation_question_id',
         'role_id'
        );
    }
}

