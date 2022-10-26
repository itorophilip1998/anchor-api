<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientCoord extends Model
{
    use HasFactory;

    protected $fillable = [
        'coord_id', 'client_id'
    ];
}
