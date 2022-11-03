<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientServiceInformation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'client_id',
        'commencement_date',
        'authorized_start_date',
        'authorized_service_hours',
        'authorized_service_days'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
