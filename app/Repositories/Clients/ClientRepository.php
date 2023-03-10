<?php
namespace App\Repositories\Clients;

use App\Http\Resources\Clients\ClientResource;
use App\Models\Clients\ClientNurse;
use App\Models\Clients\ClientHomecareworker;
use App\Models\Clients\Client;
use App\Models\Clients\ClientCoordinator;
use App\Models\Clients\ClientHealth;
use App\Models\Clients\ClientInsurance;
use App\Models\Clients\ClientPhysician;
use App\Models\Clients\ClientProxy;
use App\Models\Clients\ClientServiceInformation;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use App\Traits\UserNotification;

// $client = $this->notify($array['client_id'],'Nurse Unassigned', 'Nurse unassigned');

class ClientRepository extends BaseRepository
{
	use UserNotification;

	public function getAll(array $filters)
	{
		$clients = Client::orderBy('created_at', 'desc')->get();

        return $this->sendResponse(ClientResource::collection($clients));
		
	}	  

	public function getById($id) {

		$client = Client::find($id);

        return $this->sendResponse(new ClientResource($client), 'Client Retrieved');
	}

    public function save($data) {

        // use this for save new and update, check if the id is passed or not. TENTATIVE
        $data['spoken_languages'] = json_encode($data['spoken_languages']);
        $data['preferred_languages'] = json_encode($data['preferred_languages']);
        $data['living_with'] = json_encode($data['living_with']);

        $client = new Client($data);

        $client->save();

        // save related data
        // with empty record, just the client_id will be available in the tables
        $client->health()->save(new ClientHealth());
        $client->insurance()->save(new ClientInsurance());
        $client->physician()->save(new ClientPhysician());

        $client->proxies()->save(new ClientProxy(array('proxy' => ClientProxy::HEALTH)));
        $client->proxies()->save(new ClientProxy(array('proxy' => ClientProxy::GUARDIAN)));
        $client->proxies()->save(new ClientProxy(array('proxy' => ClientProxy::EMERGENCY_CONTACT)));

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

    public function saveProxies($data) {

        $clientId = '';

        foreach ($data as $record) {
            $proxyId = $record['id'];
            $clientId = $record['client_id'];

            $proxy = ClientProxy::find($proxyId);
            $proxy->update($record);
        }

        $client = Client::find($clientId);

        return $this->sendResponse(new ClientResource($client));
    }

    public function saveServiceInformation($id, $data) {

        $client = Client::find($id);

        if ($client->insurance == null ) {
            $insurance = new ClientInsurance($data);

            $client->insurance()->save($insurance);
        }
        else {
            $client->insurance()->update($data);
        }

        $client->refresh();

        return $this->sendResponse(new ClientResource($client));
    }

    public function savePhysicianInformation($id, $data) {

        $client = Client::find($id);

        if ($client->physician == null ) {
            $physicianInformation = new ClientPhysician($data);

            $client->physician()->save($physicianInformation);
        }
        else {
            $client->physician()->update($data);
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

        $clientCoordinator= new ClientCoordinator($coordinatorID);

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