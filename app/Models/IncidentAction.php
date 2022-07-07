<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ActionResult;

class IncidentAction extends Model
{
    use HasFactory;

    protected $fillable = ['incident_id', 'action'];

    public function result() {
        return $this->hasMany(ActionResult::class, 'action_id', 'id');
    }

    public function recommendation() {}
}
