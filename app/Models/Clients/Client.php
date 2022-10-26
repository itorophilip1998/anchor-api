<?php

namespace App\Models\Clients;

use App\Models\ClientCoord;
use App\Models\ClientHomecareworker;
use App\Models\ClientNurse;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'first_name',
        'last_name',
        'dob',
        'nationality',
        'email',
        'home_phone',
        'cell_phone',
        'work_phone',
        'address1',
        'address2',
        'city',
        'state',
        'residence_country',
        'zip',
        'gender',
        'sexuality',
    ];

    protected $with = [
        'physicianInformation',
        'serviceInformation',
        'nurse',
        'homecareworker',
        'coordinator',
    ];

    public function physicianInformation()
    {
        return $this->hasOne(ClientPhysician::class);
    }

    public function serviceInformation()
    {
        return $this->hasOne(ClientServiceInformation::class);
    }

    public function clientNurse() 
    {
        return $this->hasOne(ClientNurse::class);
    }

    public function nurse() 
    {
        return $this->hasOneThrough(
            User::class,
            ClientNurse::class,
            'client_id', 
            'uuid', 
            'id', 
            'nurse_id' 
        );
    }

    public function clientHomecareworker() 
    {
        return $this->hasOne(ClientHomecareworker::class);
    }

    public function homecareworker() 
    {
        return $this->hasOneThrough(
            User::class,
            ClientHomecareworker::class,
            'client_id', 
            'uuid', 
            'id', 
            'homecareworker_id' 
        );
    }

    public function clientCoordinator() 
    {
        return $this->hasOne(ClientCoord::class);
    }

    public function coordinator() 
    {
        return $this->hasOneThrough(
            User::class,
            ClientCoord::class,
            'client_id', 
            'uuid', 
            'id', 
            'coord_id' 
        );
    }
}
