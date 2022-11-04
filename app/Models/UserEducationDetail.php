<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEducationDetail extends Model
{
    use HasFactory;

    // $table->string('education_level');
    // $table->string('degree');
    // $table->date('acquired_date');
    // $table->string('institution');

    protected $fillable = [
        'user_id',
        'education_level',
        'degree',
        'acquired_date',
        'institution',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
