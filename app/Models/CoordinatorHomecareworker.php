<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoordinatorHomecareworker extends Model
{
    use HasFactory;

    public function coord() {
        return $this->hasOne(User::class, 'coord_id', 'id');
    }
}
