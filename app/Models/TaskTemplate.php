<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskTemplate extends Model
{
    use HasFactory;


    protected $with = ['component', 'category', 'field'];

    public function component() {
        return $this->belongsTo(TaskComponent::class, 'task_component_id', 'id');
    }

    public function category(){
        return $this->belongsTo(TaskCategory::class, 'task_category_id', 'id');
    }

    public function field() {
        return $this->hasMany(TaskField::class, 'task_template_id',  'id');
    }
}
