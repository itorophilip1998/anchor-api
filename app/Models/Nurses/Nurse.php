<?php

namespace App\Models\Nurses;

use App\Models\User;

class Nurse extends User
{
    protected $table = 'users';
 
    public static function boot()
    {
        parent::boot();
 
        static::addGlobalScope(function ($query) {
            $query->where('role_id', 6); // 6 is the roleID for nurses. This is not really smart, but used it because its been defined already.
        });

        static::saving(function ($record) {
            $record->role_id = 6;         
        });
    }
}
