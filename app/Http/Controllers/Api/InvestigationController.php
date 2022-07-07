<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Investigation\InvestigationService;

class InvestigationController extends Controller{
   
    private $investigation;

    public function __construct(InvestigationService $investigationService){
        $this->investigation = $investigationService;
    }

    /**
     * This function just get all investigation types;
     * @return [type] [description]
     */
    public function investigationType() {
        return $this->investigation->getInvestigationTypes();
    }


}
