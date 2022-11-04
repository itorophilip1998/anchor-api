<?php

namespace App\Models\Clients;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'prefix',
        'first_name',
        'middle_name',
        'last_name',
        'preferred_name',
        'suffix',
        'dob',
        'nationality',
        'email',
        'home_phone',
        'cell_phone',
        'work_phone',
        'client_id_number',
        'elevator',
        'ssn',
        'primary_hospital',
        'closest_hospital',
        'living_situation',
        'living_with',
        'living_alone',
        'floor',
        'address',
        'city',
        'state',
        'county',
        'residence_country',
        'spoken_languages',
        'preferred_languages',
        'racial_identity',
        'ethnicity',
        'marital_status',
        'zip',
        'gender',
        'sexuality',
    ];

    protected $with = [
        'physician',
        'insurance',
        'health',
        'proxies',
        'nurse',
        'homecareworker',
        'coordinator',
    ];

    public function proxies()
    {
        return $this->hasMany(ClientProxy::class);
    }

    public function physician()
    {
        return $this->hasOne(ClientPhysician::class);
    }

    public function insurance()
    {
        return $this->hasOne(ClientInsurance::class);
    }

    public function health()
    {
        return $this->hasOne(ClientHealth::class);
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
        return $this->hasOne(ClientCoordinator::class);
    }

    public function coordinator() 
    {
        return $this->hasOneThrough(
            User::class,
            ClientCoordinator::class,
            'client_id', 
            'uuid', 
            'id', 
            'coordinator_id' 
        );
    }
}
