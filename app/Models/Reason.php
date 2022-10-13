<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reason extends Model
{
    use HasFactory;

    protected $fillable = [
        'reason',
        'reason_category_id',
        'incident_type_id',
    ];

    protected $with = [
        'incidentType',
        'reasonCategory',
    ];

    public function incidentType() {
        return $this->belongsTo(IncidentType::class);
    }

    public function reasonCategory() {
        return $this->belongsTo(ReasonCategory::class);
    }
}
