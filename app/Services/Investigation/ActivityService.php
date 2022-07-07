<?php 
namespace App\Services\Investigation;

use App\Models\InvestigationActivity;

class ActivityService {

	private $activity;

	public function __construct() {
		$this->activity  = new InvestigationActivity;
	}
}


 ?>