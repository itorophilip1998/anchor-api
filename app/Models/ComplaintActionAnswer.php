<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ComplaintActionResponse;

class ComplaintActionAnswer extends Model
{
    use HasFactory;

    protected $with = ['response'];

    public function response() {
        return $this->belongsTo(ComplaintActionResponse::class, 'id', 'action_answer_id');
    }
}
