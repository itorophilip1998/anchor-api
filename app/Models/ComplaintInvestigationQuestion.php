<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ComplaintInvestigationAnswer;

class ComplaintInvestigationQuestion extends Model
{
    use HasFactory;

    protected $with = ['answer'];

    public function answer() {
        return $this->hasMany(ComplaintInvestigationAnswer::class,
        'question_id', 'id');
    }
}
