<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Role;
use App\Models\UserStatus;
use App\Models\UserDetail;
use App\Models\CoordinatorHomecareworker;
use App\Models\WorkDetail;
use App\Models\MedicalDetail;
use App\Models\ClientNurse;
use App\Models\ClientCoord;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;



class User extends Authenticatable
{
    use Uuid, HasRoles;
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    // protected $keyType = 'string';
    protected $primaryKey = 'uuid';
    protected $guard_name = 'sanctum';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'email',
        'password',
        'role_id',
        'uuid'
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

    //start jwt token

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }


    public function getJWTCustomClaims()
    {
        return [];
    }

    //end jwt params




    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $with = ['detail', 'emergencyContacts', 'educationDetails'];


    public static function boot()
    {

        parent::boot();
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Str::uuid();
        });
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function status()
    {
        return $this->belongsTo(UserStatus::class, 'status_id');
    }

    public function detail()
    {
        return $this->hasOne(UserDetail::class, 'user_id');
    }

    public function medical()
    {
        return $this->hasOne(MedicalDetail::class, 'user_id');
    }

    public function work()
    {
        return $this->hasOne(WorkDetail::class, 'user_id');
    }

    // for homecare worker
    public function coordinator()
    {
        return $this->hasMany(CoordinatorHomecareworker::class, 'homecarework_id', 'uuid');
    }

    public function emergencyContacts()
    {
        return $this->hasMany(UserEmergencyContact::class, 'user_id');
    }

    public function educationDetails()
    {
        return $this->hasMany(UserEducationDetail::class, 'user_id');
    }
}
