<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientCoordinator extends Model
{
    use HasFactory;

    protected $fillable = [
        'coordinator_id', 'client_id'
    ];
}
