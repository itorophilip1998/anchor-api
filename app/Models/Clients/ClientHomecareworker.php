<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientHomecareworker extends Model
{
    use HasFactory;

    protected $fillable = [
        'homecareworker_id', 'client_id'
    ];
}
