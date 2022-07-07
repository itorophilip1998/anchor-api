<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ComplaintActionAnswer;

class ComplaintAction extends Model
{
    use HasFactory;

    protected $with = ['action_answer'];

    public function action_answer() {
        return $this->hasMany(ComplaintActionAnswer::class, 'action_id', 'id');
    }
}
