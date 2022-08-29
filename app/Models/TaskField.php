<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskField extends Model
{
    use HasFactory;

    protected $fillable = ['caption', 'task_template_id', 'element_type_id'];

    public function element() {
        return $this->belongsTo(TaskFieldElement::class, 'element_type_id', 'id');
    }
}
