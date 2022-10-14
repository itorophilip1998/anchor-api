<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidentPhase extends Model
{
    use HasFactory;

    const ANALYSIS = 2; // id from db
    const INVESTIGATION = 3;
    const RESOLUTION = 4;
    const FOLLOWUP = 5;
    const FEEDBACK = 6;
    
}
