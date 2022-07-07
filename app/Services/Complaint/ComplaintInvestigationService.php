<?php
namespace App\Services\Complaint;


use App\Models\ComplaintInvestigationQuestion;
use App\Models\ComplaintInvestigationAnswer;
use App\Http\Resources\Investigation\InvestigationCollection;

class ComplaintInvestigationService {

	private $investigations;

	public function __construct() {
		$this->investigations = new ComplaintInvestigationQuestion;
	}

	public function index(array $array) {
		return new InvestigationCollection($this->investigations->orderBy('id', 'desc')->get());
	}

}

?>