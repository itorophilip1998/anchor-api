<?php
namespace App\Services\Investigation;

use App\Models\InvestigationQuestion;
use App\Models\InvestigationQuestionAnswer;

use App\Services\Incident\ReasonService;
use App\Http\Resources\InvestigationResource;

class InvestigationService {

	private $question;
	private $answer;

	public function __construct() {
		$this->question = new InvestigationQuestion;
		$this->answer = new InvestigationQuestionAnswer;
	}

	public function get_investigation_by_reason($reason) {
		if ($reason) {
		  $reason_category_id = (new ReasonService)->get_reason_category($reason);
	      return  new InvestigationResource($this->question->where('reason_category_id', '=', $reason_category_id )->with(['answer'])->get());
		}
	}

}
?>