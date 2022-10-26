<?php

namespace App\Http\Controllers\Api\Clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clients\AssignCoordinatorRequest;
use App\Http\Requests\Clients\AssignHomecareworkerRequest;
use App\Http\Requests\Clients\AssignNurseRequest;
use App\Http\Requests\Clients\StoreClientRequest;
use App\Http\Requests\Clients\StorePhysicianInformationRequest;
use App\Http\Requests\Clients\StoreServiceInformationRequest;
use App\Http\Requests\Clients\UpdateClientRequest;
use App\Repositories\Clients\ClientRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    private $clientRepository;
    
    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function index(Request $request) 
    {
        $filters = $request->all();

        return $this->clientRepository->getAll($filters);

    }

    public function show($id) {

        return $this->clientRepository->getById($id);
    }

    public function store(StoreClientRequest $request) {

        $input = $request->all();

        return $this->clientRepository->save($input);
    }

    public function update($id, UpdateClientRequest $request) {

        $input = $request->all();

        if ($request->has('dob')) {
            //transform the format
           $input['dob'] = Carbon::parse($request->dob)->format('Y-m-d');
        }

        return $this->clientRepository->update($id, $input);
    }

    public function delete($id) {

        return $this->clientRepository->delete($id);
    }

    public function saveServiceInformation($id, StoreServiceInformationRequest $request ) {

        $input = $request->except(['created_at', 'updated_at']);

        $input['commencement_date'] = Carbon::parse($request->commencement_date)->format('Y-m-d');
        $input['authorized_start_date'] = Carbon::parse($request->authorized_start_date)->format('Y-m-d');

        return $this->clientRepository->saveServiceInformation($id, $input);
    }

    public function savePhysicianInformation($id, StorePhysicianInformationRequest $request ) {

        $input = $request->except(['created_at', 'updated_at']);

        return $this->clientRepository->savePhysicianInformation($id, $input);
    }

    public function assignNurse($id, AssignNurseRequest $request) {

        $nurseID = $request->only(['nurse_id']);

        return $this->clientRepository->assignNurse($id, $nurseID);
    }

    public function unassignNurse($id) {

        return $this->clientRepository->unassignNurse($id);
    }

    public function assignHomecareworker($id, AssignHomecareworkerRequest $request) {

        $homecareworkerID = $request->only(['homecareworker_id']);

        return $this->clientRepository->assignHomecareworker($id, $homecareworkerID);
    }

    public function unassignHomecareworker($id) {

        return $this->clientRepository->unassignHomecareworker($id);
    }

    public function assignCoordinator($id, AssignCoordinatorRequest $request) {

        $coordinatorID['coord_id'] = $request->coordinator_id;

        return $this->clientRepository->assignCoordinator($id, $coordinatorID);
    }

    public function unassignCoordinator($id) {

        return $this->clientRepository->unassignCoordinator($id);
    }
}
