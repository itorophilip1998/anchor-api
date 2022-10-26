<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientPhysician extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'client_id',
        'first_name',
        'last_name',
        'email',
        'phone'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
