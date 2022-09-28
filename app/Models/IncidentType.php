<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\IncidentTypeCategory;

class IncidentType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
    ];

    protected $appends = ['category_name'];

    public function getCategoryNameAttribute() {
        return $this->category()->first()->name;
    }

    public function category() {
        return $this->hasMany(IncidentTypeCategory::class, 'id', 'category_id');
    }
}
