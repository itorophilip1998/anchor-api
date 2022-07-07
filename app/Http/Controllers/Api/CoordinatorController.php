<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\CoordinatorRepositoryInterface;
use Illuminate\Http\Request;
use App\Services\Coordinator\CoordinatorService;

class CoordinatorController extends Controller
{

    private $coordinator;
    

    public function __construct() {
        $this->coordinator = new CoordinatorService;
    }

    public function index(Request $request) {

        $coordinator = new CoordinatorService;

        $attributes = $request->all();

        $coordinator = $coordinator->get_coordinator($attributes);

        return $coordinator;
    } 

    public function assign(Request $request ) {

        $attributes = $request->all();

        $coordinator = $this->coordinator->assign_homecareworker($attributes);

        return $coordinator;
    }
}
