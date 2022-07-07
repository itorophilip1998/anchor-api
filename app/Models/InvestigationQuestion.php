<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\InvestigationQuestionAnswer;

class InvestigationQuestion extends Model
{
    use HasFactory;

    protected $with = ['answer'];
    
    public function answer() {
        return $this->hasMany(InvestigationQuestionAnswer::class, 'investigation_question_id');
    }
}
