<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidentAnalysis extends Model
{
    use HasFactory;

    protected $fillable = [
        'incident_id',
        'injury_id',
        'incident_location_id',
        'description',
        'incident_case_type_id'
    ];

    protected $with = [
        'incidentCaseType',
        'incidentLocation',
        'injury',
    ];

    public function incidentCaseType()
    {
        return $this->belongsTo(IncidentCaseType::class);
    }

    public function incidentLocation()
    {
        return $this->belongsTo(IncidentLocation::class);
    }

    public function injury()
    {
        return $this->belongsTo(Injury::class);
    }
}
