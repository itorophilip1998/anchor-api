<?php

namespace App\Http\Controllers\Api;

use App\Interfaces\StatusRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class StatusController extends Controller
{

    private $status;

    public function __construct(StatusRepositoryInterface $status) {
        $this->status = $status;
    }

    public function index() 
    {
        return $this->status->getAllStatuses();
    }

    public function store(Request $request) 
    {
        $attributes = $request->all();

        return $this->status->createUserStatus($attributes);
    }

    public function editUserStatus($userId, Request $request ) 
    {
        return $this->status->updateUserStatus($userId, $request[0] );
    }
}
