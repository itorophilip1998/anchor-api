<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskFieldElement extends Model
{
    use HasFactory;

    protected $with = [ 'element_value' ];

    public function element_value() {
         return $this->hasMany(TaskFieldElementValue::class, 'task_field_element_id', 'id');
    }
}
