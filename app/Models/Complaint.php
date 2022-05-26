<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ComplaintInvestigationQuestion;
use App\Models\ComplaintTypeQuestion;
use App\Models\ComplaintType;
use App\Models\ClientComplaint;
use App\Models\User;

class Complaint extends Model
{
    use HasFactory;

    public function type() {
        return $this->belongsTo(ComplaintType::class, 'complaint_type_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'added_by', 'id');
    }

    public function client() {
        return $this->belongsToMany(User::class, ClientComplaint::class, 'complaint_id', 'client_id' );
    }

    public function category() {
        return $this->belongsTo(ComplaintCategory::class, 'complaint_category_id', 'id');
    }
}

// -- type
// -- questions
// 
// question_type