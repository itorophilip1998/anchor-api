<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ComplaintCategory;
use App\Models\ComplaintInvestigationQuestion;
use App\Models\ComplaintTypeQuestion;
use App\Models\ComplaintAction;
use App\Models\ComplaintActionType;

class ComplaintType extends Model
{
    use HasFactory;
    
    public function category() {
        // return $this->belongsTo('')
    }

    public function investigation() {
       
        return $this->belongsToMany(ComplaintInvestigationQuestion::class, 
            ComplaintTypeQuestion::class, 
                'complaint_type_id',
                'complaint_question_id'
        );
    }

    public function action() {
        return $this->belongsToMany(ComplaintAction::class, 
              ComplaintActionType::class, 'complaint_type_id', 'complaint_action_id');
    }

}
