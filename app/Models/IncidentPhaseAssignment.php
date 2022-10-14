<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidentPhaseAssignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'incident_id',
        'incident_phase_id',
        'assigned_to',
        'role_id'
    ];

    protected $with = [
        'incidentPhase',
        'user'
    ];

    public function incident() {
        return $this->belongsTo(Incident::class);
    }

    public function incidentPhase() {
        return $this->belongsTo(IncidentPhase::class);
    }

    public function user() {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
