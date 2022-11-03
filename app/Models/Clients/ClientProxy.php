<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientProxy extends Model
{
    use HasFactory, SoftDeletes;

    // using this to save the Parent/Guardian, Health Proxy and Contact Information
    // Proxy Data:: from the documentation. Guide on Client Data.

    const HEALTH = 'health';
    const GUARDIAN = 'guardian';
    const EMERGENCY_CONTACT = 'contact';

    protected $fillable = [
        'client_id',
        'proxy',
        'firstname',
        'lastname',
        'relationship',
        'phone',
        'email'
    ];

    public function client() 
    {
        return $this->belongsTo(Client::class);
    }
}
