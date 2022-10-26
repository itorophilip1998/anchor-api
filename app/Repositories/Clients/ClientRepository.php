<?php
namespace App\Repositories\Clients;

use App\Http\Resources\Clients\ClientResource;
use App\Models\User;
use App\Models\ClientCoord;
use App\Models\ClientNurse;
use App\Models\ClientHomecareworker;
use App\Models\Clients\Client;
use App\Models\Clients\ClientPhysician;
use App\Models\Clients\ClientServiceInformation;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use App\Traits\UserNotification;


class ClientRepository extends BaseRepository
{
	use UserNotification;

	public function getAll(array $filters)
	{
		$clients = Client::all();

        return $this->sendResponse(ClientResource::collection($clients));
		
	}	  

	public function getById($id) {

		$client = Client::find($id);

        return $this->sendResponse(new ClientResource($client), 'Client Retrieved');
	}

    public function save($data) {

        // use this for save new and update, check if the id is passed or not. TENTATIVE
        
        $client = new Client($data);

        $client->save();

        return $this->sendResponse(new ClientResource($client));
    }

    public function update($id, $data) {

        $client = Client::find($id);

        if ($client->update($data)) {
            return $this->sendResponse(new ClientResource($client), 'Client updated successfully');
        }

        return $this->sendError('Unable to update client');
    }

    public function delete($id) {

        $client = Client::find($id);

        if ($client->delete()) {
            // return all data, so i dont need to call api twice
            return $this->getAll([]);
        }
        
        return $this->sendError('Unable to delete client');
    }

    public function saveServiceInformation($id, $data) {

        $client = Client::find($id);

        if ($client->serviceInformation == null ) {
            $serviceInformation = new ClientServiceInformation($data);

            $client->serviceInformation()->save($serviceInformation);
        }
        else {
            $client->serviceInformation()->update($data);
        }

        $client->refresh();

        return $this->sendResponse(new ClientResource($client));
    }

    public function savePhysicianInformation($id, $data) {

        $client = Client::find($id);

        if ($client->physicianInformation == null ) {
            $physicianInformation = new ClientPhysician($data);

            $client->physicianInformation()->save($physicianInformation);
        }
        else {
            $client->physicianInformation()->update($data);
        }

        $client->refresh();

        return $this->sendResponse(new ClientResource($client));
    }

    public function assignNurse($id, $nurseID) {

        $client = Client::find($id);

        $clientNurse = new ClientNurse($nurseID);

        $client->clientNurse()->save($clientNurse);

        $client->refresh();

        return $this->sendResponse(new ClientResource($client), 'Nurse assigned successfully');
    }

    public function unassignNurse($id) {

        $client = Client::find($id);

        $client->clientNurse()->delete();
        $client->refresh();

        return $this->sendResponse(new ClientResource($client), 'Nurse unassigned successfully');
    }

    public function assignHomecareworker($id, $homecareworkerID) {

        $client = Client::find($id);

        $clientHCW= new ClientHomecareworker($homecareworkerID);
        $clientHCW->added_by = auth()->user()->uuid;

        $client->clientHomecareworker()->save($clientHCW);

        $client->refresh();

        return $this->sendResponse(new ClientResource($client), 'Homecareworker assigned successfully');
    }

    public function unassignHomecareworker($id) {

        $client = Client::find($id);

        $client->clientHomecareworker()->delete();
        $client->refresh();

        return $this->sendResponse(new ClientResource($client), 'Homecareworker unassigned successfully');
    }

    public function assignCoordinator($id, $coordinatorID) {

        $client = Client::find($id);

        $clientCoordinator= new ClientCoord($coordinatorID);

        $client->clientCoordinator()->save($clientCoordinator);

        $client->refresh();

        return $this->sendResponse(new ClientResource($client), 'Coordinator assigned successfully');
    }

    public function unassignCoordinator($id) {

        $client = Client::find($id);

        $client->clientCoordinator()->delete();

        $client->refresh();

        return $this->sendResponse(new ClientResource($client), 'Coordinator unassigned successfully');
    }
}
?>