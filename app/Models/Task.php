<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Task extends Model
{
    use HasFactory,  LogsActivity;

    protected $fillable = ['title', 'uid', 'frequency', 'levels', 'date', 'time'];
    protected $appends  = ["role_name", "task_category_title"];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['title', 'uid', 'frequency', 'levels', 'date', 'time']);
        // Chain fluent methods for configuration options
    }

    public function taskCat(){
        return $this->belongsTo(TaskCategory::class, 'category');
    }

    public function taskAssignedTo(){
        return $this->belongsTo(Role::class, 'assigned_to');
    }

    public function getRoleNameAttribute(){
        return $this->taskAssignedTo()->first()->name;
    }

    public function getTaskCategoryTitleAttribute(){
        return $this->taskCat()->first()->title;
    }
}
