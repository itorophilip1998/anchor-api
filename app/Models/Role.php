<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Role extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = ['name', 'uid'];

    public function users() {
        return $this->belongsToMnay('App\Models\User')->withTimestamps();
    }


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['name', 'uid']);
        // Chain fluent methods for configuration options
    }

}
