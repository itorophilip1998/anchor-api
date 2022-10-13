<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Reason;
use App\Models\IncidentReason;
use App\Models\IncidentTypeCategory;
use App\Models\IncidentAction;
use App\Models\ActivitySelected;
use App\Models\IncidentActivity;
use Carbon\Carbon;

class Incident extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'date',
        'timeline',
        'time',
        'client_relation',
        'hours_of_incident',
        'incident_level',
        'coord_involved',
        'nurse_involved',
        'homecareworker',
        'incident_type',
        'incident_type_category_id',
        'resolution_timeline',
        'isInsurance',
    ];

    protected $with = [
        'analysis',
        'investigation_responses',
        'action',
        'client',
        'selectedActions',
        'resolution',
        'feedback',
        'incidentPhaseAssignments'
    ];

    protected $appends = [
        'days_taken'
    ];

    public function incidentPhaseAssignments() {
        return $this->hasMany(IncidentPhaseAssignment::class);
    }

    public function getAnalysisAssignment() {
        return IncidentPhaseAssignment::where('incident_phase_id', IncidentPhase::ANALYSIS)
                                        ->where('incident_id', $this->id)
                                        ->first();
    }

    public function getInvestigationAssignment() {
        return IncidentPhaseAssignment::where('incident_phase_id', IncidentPhase::INVESTIGATION)
                                         ->where('incident_id', $this->id)->first();
    }

    public function getResolutionAssignment() {
        return IncidentPhaseAssignment::where('incident_phase_id', IncidentPhase::RESOLUTION)
                                        ->where('incident_id', $this->id)->first();
    }

    public function getDaysTakenAttribute() {

        if ($this->resolution == null) {
            return null;
        }
        
        $incidentReportedAt  = new Carbon($this->created_at);
        $resolvedAt = new Carbon($this->resolution->created_at); // use this for now, not sure of resolved_at 
        
        return $incidentReportedAt->diffInDays($resolvedAt);

    }

    public function selectedActions() {
        return $this->hasMany(IncidentActionSelected::class);
    }

    // below is for extra details performed in the analysis stage
    public function analysis() {
        return $this->hasOne(IncidentAnalysis::class);
    }
    
    public function investigation_responses() {
        return $this->hasMany(InvestigationResponse::class, 'incident_id', 'iuid');
    }

    public function resolution() {
        return $this->hasOne(IncidentResolution::class);
    }

    public function feedback() {
        return $this->hasOne(IncidentFeedback::class);
    }

    public function nurse() {
         return $this->hasOne(User::class, 'uuid', 'nurse_involved');
    }

    public function coord() {
        return $this->hasOne(User::class, 'uuid', 'coord_involved');
    }

    public function creator() {
        return $this->hasOne(User::class, 'uuid', 'added_by');
    }

    public function type() {
        return $this->hasOne(IncidentType::class, 'id', 'incident_type');
    }

    public function category() {
        return $this->hasOne(IncidentTypeCategory::class, 'id', 'incident_type_category_id');
    }

    public function client() {
        return $this->hasOne(User::class, 'uuid', 'client_id');
    }

    public function reason() {
        return $this->hasMany(Reason::class, 'incident_type_id', 'incident_type');
    }

    public function reason_response() {
        return $this->hasOne(IncidentReason::class, 'incident_id', 'id');
    }

    public function action() {
        return $this->hasMany(IncidentAction::class, 'incident_id', 'id');
    }

    public function activity() {
        return $this->hasMany(ActivitySelected::class, 'incident_id');
    }

    public function hcw() {
        return $this->hasOne(User::class, 'uuid', 'homecareworker');
    }
}
