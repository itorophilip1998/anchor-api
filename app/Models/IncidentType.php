<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\IncidentTypeCategory;

class IncidentType extends Model
{
    use HasFactory;

    public function category() {
        return $this->hasMany(IncidentTypeCategory::class, 'id', 'category_id');
    }
}
