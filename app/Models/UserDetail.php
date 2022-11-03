<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'preferred_name',
        'dob',
        'nationality',
        'home_phone',
        'cell_phone',
        'work_phone',
        'ssn',
        'living_situation',
        'living_with',
        'living_alone',
        'floor',
        'address1',
        'address2',
        'city',
        'state',
        'county',
        'residence_country',
        'languages',
        'racial_identity',
        'ethnicity',
        'marital_status',
        'zip',
        'gender',
        'sexuality',
    ];

    protected $casts = [
        'languages' => 'array',
        'living_with' => 'array',
        'dob' => 'datetime:Y-m-d',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setDobAttribute($value)
    {
        $this->attributes['dob'] =  Carbon::parse($value);
    }

}
