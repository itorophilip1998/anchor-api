<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\NurseRepositoryInterface;

class NurseController extends Controller
{
    private $nurse;

    public function __construct(NurseRepositoryInterface $nurserepositoryinterface) {
        $this->nurse = $nurserepositoryinterface;
    }  

    public function index(Request $request) {

        //filter optional enable
        $attributes = $request->all();

        return $this->nurse->getALlNurses($attributes);
    }
}
