<?php 
namespace App\Services\Complaint;

use App\Models\ComplaintAction;
use App\Models\ComplaintActionAnswer;

class ActionService {

	private $action;
	private $answer;

	public function __construct(){

		$this->action = new ComplaintAction;
		$this->answer = new ComplaintActionAnswer;
	}

	public function getActionIdByAction($action){
		return $this->action->where('action', '=', $action)->first()->id;
	}


	public function getActionAnswerbyAnswer($answer) {
		return $this->answer->where('action_answer', '=', $answer)->first()->id;
	}
}

 ?>