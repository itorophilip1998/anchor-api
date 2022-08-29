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
    
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['title', 'uid', 'frequency', 'levels', 'date', 'time']);
        // Chain fluent methods for configuration options
    }
}
