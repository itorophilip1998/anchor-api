<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Reason;
use App\Models\IncidentReason;
use App\Models\IncidentTypeCategory;
use App\Models\IncidentAction;

class Incident extends Model
{
    use HasFactory;

    public function nurse() {
         return $this->hasOne(User::class, 'id', 'nurse_involved');
    }

    public function coord() {
        return $this->hasOne(User::class, 'id', 'coord_involved');
    }

    public function creator() {
        return $this->hasOne(User::class, 'id', 'added_by');
    }

    public function type() {
        return $this->hasOne(IncidentType::class, 'id', 'incident_type');
    }

    public function category() {
        return $this->hasOne(IncidentTypeCategory::class, 'id', 'incident_type_category_id');
    }

    public function client() {
        return $this->hasOne(User::class, 'id', 'client_id');
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
}
