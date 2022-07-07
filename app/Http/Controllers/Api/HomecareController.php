<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\HomecareRepositoryInterface;

class HomecareController extends Controller
{
    
    private $homecare;

    public function __construct(HomecareRepositoryInterface $homecare) {
        $this->homecare = $homecare;
    }

    public function index(Request $request) {

        $attributes = $request->all();

        $homecareworkers = $this->homecare->getHomecareworkers($attributes);

        return $homecareworkers;
    }

    public function show($id) {
        return $this->homecare->getHomecareworkerById( $id );
    }
    
    public function store( Request $request) 
    {

        $request->validate([
          'firstname' => 'required|min:3',
          'lastname' => 'required:min:3"',
          'dob' => 'required',
          'email' => 'required|email|unique:users,email'
        ]);

        $attributes = $request->all();

        $results = $this->homecare->addHomecareWorker($attributes);

        return $results;
    }
}
