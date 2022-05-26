<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Role;
use App\Models\UserStatus;
use App\Models\UserDetail;
use App\Models\CoordinatorHomecareworker;
use App\Models\WorkDetail;
use App\Models\MedicalDetail;
use App\Models\ClientNurse;
use App\Models\ClientCoord;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

  protected $with = ['detail'];

    public function role() {
         return $this->belongsTo(Role::class, 'role_id');
    }

    public function status() {
        return $this->belongsTo(UserStatus::class, 'status_id');
    }

    public function detail() {
        return $this->hasOne(UserDetail::class, 'user_id');
    }

    public function medical() {
        return $this->hasOne(MedicalDetail::class, 'user_id');
    }

    public function work() {
        return $this->hasOne(WorkDetail::class, 'user_id');
    }

    // for homecare worker
    public function coordinator() {
        return $this->hasMany(CoordinatorHomecareworker::class, 'homecarework_id', 'id');
    }

    // for client
    public function client_nurse() {
        return $this->hasMany(ClientNurse::class, 'client_id', 'id');
    }

    public function client_coord() {
        return $this->hasMany(ClientCoord::class, 'client_id', 'id');
    }
}
