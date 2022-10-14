<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestigationResponse extends Model
{
    use HasFactory;

    protected $fillable = ['incident_id', 'investigation_question_id', 'response'];

    protected $with = [
        'question',
    ];

    public function question() {
        return $this->belongsTo(InvestigationQuestion::class, 'investigation_question_id');
    }
}
