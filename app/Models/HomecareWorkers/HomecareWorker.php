<?php

namespace App\Models\HomecareWorkers;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HomecareWorker extends User
{
    use HasFactory;

    protected $table = 'users';
 
    public static function boot()
    {
        parent::boot();
 
        static::addGlobalScope(function ($query) {
            $query->where('role_id', 7); // 7 is the roleID for homecareworkers. This is not really smart, but used it because its been defined already.
        });

        static::saving(function ($record) {
            $record->role_id = 7;         
        });
    }
}
