<?php

namespace App\Models\Clients;

use App\Models\Clients\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class ClientNurse extends Model
{
    use HasFactory;

    protected $fillable = [
        'nurse_id', 'client_id'
    ];

    public function nurse() {
        return $this->hasOne(User::class, 'id', 'nurse_id');
    }

    public function client() {
        return $this->hasOne(Client::class, 'id', 'nurse_id');
    }

    public function nurse_detail() {
        return $this->hasOne(User::class, 'id', 'nurse_id');
    }

    public function client_detail() {
        return $this->belongsTo(User::class, 'client_id', 'id');
    }
}
