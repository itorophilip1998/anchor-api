<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidentActionSelected extends Model
{
    use HasFactory;

    protected $with = [
        'incidentAction',
        'recommendations',
        'results'
    ];

    public function incident() {
        return $this->belongsTo(Incident::class);
    }

    public function incidentAction() {
        return $this->belongsTo(IncidentAction::class);
    }

    public function recommendations() {
        return $this->hasMany(IncidentActionRecommendation::class);
    }

    public function results() {
        return $this->hasMany(IncidentActionResult::class);
    }
}
