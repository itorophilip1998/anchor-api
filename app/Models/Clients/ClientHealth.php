<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientHealth extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'client_id',
    ];

    public function client() 
    {
        return $this->belongsTo(Client::class);
    }
}
