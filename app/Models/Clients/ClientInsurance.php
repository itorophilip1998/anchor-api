<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientInsurance extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'client_id',
        'insurance_type',
        'insurance_number',
        'insurance_provider',
        'program_name',
        'authorization_received',
        'authorization_start_date',
        'authorization_end_date',
        'm11q_received',
        'm11q_on_file',
        'm11q_on_file_date',
        'care_start_date',
        'authorized_service_hours',
        'authorized_service_days',
        'certification_start_date',
        'certification_end_date',
        'pharmacy', // the full obj for pharm data: name, contact etc
    ];

    protected $casts = [
        'insurance_type' => 'array',
        'authorized_service_days' => 'array',
        'pharmacy' => 'array'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
