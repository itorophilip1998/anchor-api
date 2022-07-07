<?php 
namespace App\Services\Incident;

use App\Models\IncidentTypeCategory;
use Response;

Class TypeService {

	private $type;

	public function __construct(){
	  $this->types = new IncidentTypeCategory;
	}


	public function index() {
		return Response::json($this->types->get());
	}

	public function 
}


 ?>