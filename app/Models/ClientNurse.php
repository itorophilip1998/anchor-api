<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class ClientNurse extends Model
{
    use HasFactory;

    public function nurse_detail() {
        return $this->hasOne(User::class, 'id', 'nurse_id');
    }

    public function client_detail() {
        return $this->belongsTo(User::class, 'client_id', 'id');
    }
}
