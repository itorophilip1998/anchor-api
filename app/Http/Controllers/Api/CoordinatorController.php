<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\CoordinatorRepositoryInterface;
use Illuminate\Http\Request;

class CoordinatorController extends Controller
{
    
    private $coordinator;

    public function __construct(CoordinatorRepositoryInterface $coordinator) {
        $this->coordinator = $coordinator;
    }

    public function index(Request $request) {

        $attributes = $request->all();

        $coordinator = $this->coordinator->get_coordinator($attributes);

        return $coordinator;
    } 

    public function assign(Request $request ) {

        $attributes = $request->all();

        $coordinator = $this->coordinator->assign_homecareworker($attributes);

        return $coordinator;
    }
}
