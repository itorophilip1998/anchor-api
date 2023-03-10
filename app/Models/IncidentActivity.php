<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidentActivity extends Model
{
    use HasFactory;

    public function detail() {
        return $this->belongsTo(InvestigationActivity::class, 'activity_id', 'id');
    }
}
