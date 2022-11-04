<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEmergencyContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'relationship',
        'address',
        'city',
        'state',
        'zip',
        'cell_phone',
        'work_phone',
        'home_phone',
        'email'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
