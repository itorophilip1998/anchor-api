<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ClientRepository;
use App\Interfaces\ClientRepositoryInterface;

class ClientController extends Controller
{
    private $client;
    
    public function __construct(ClientRepositoryInterface $client)
    {
        $this->client = $client;
    }

    public function index(Request $request) 
    {
        $attributes = $request->all();

        $clients = $this->client->getAllClients($attributes);

        return $clients;
    }

    public function store(request $request) {

        $attributes = $request->all();

        $request->validate([
            'firstname' => 'required|min:3',
            'lastname' => 'required|min:3',
            'dob' => 'required',
            'email' => 'required|email|unique:users,email'
        ]);

        return $this->client->AddClient($attributes);
    }

    public function details($id) {

        $client_id = $id;
        return $this->client->getClientById($client_id);
    }


    public function assign_coordinator(Request $request) {

        $attributes = $request->all();

        return $this->client->assignCoord($attributes);
    }

    public function assign_nurse( request $request )
    {
        $attributes = $request->all();

        return $this->client->assignNurse($attributes);
    }

    public function assign_hcw(Request $request) {

        $attributes = $request->all();

        return $this->client->assignHomecareworker($attributes);
    }

     public function unassign_nurse(Request $request) {

        $attributes = $request->all();
        return $this->client->unassign_nurse($attributes);
    }

    public function unassign_coord( request $request)
    {
        $attributes = $request->all();
        return $this->client->unassign_coord($attributes);
    }

    public function unassign_homecareworker( Request  $request)
    {
        $attributes  = $request->all();
        return $this->client->unassign_homecareworker($attributes);
    }

    // public function create()
    // {
    //     abort_if(!auth()->user->can('add-client'), code: 405, message: 'You do not have permission to add a client');
    // }
}
