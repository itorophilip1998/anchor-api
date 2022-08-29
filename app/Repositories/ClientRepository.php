<?php
namespace App\Repositories;

use App\Interfaces\ClientRepositoryInterface;
use App\Http\Resources\ClientResource;
use App\Models\User;
use App\Models\UserDetail;
use App\Model\EmergencyContact;
use App\Models\ServiceDetail;
use App\Models\Physician;
use App\Models\ClientInsurance;
use App\Models\ClientCoord;
use App\Models\ClientNurse;
use App\Models\ClientHomecareworker;
use Carbon\Carbon;
use App\Traits\UserNotification;
use Auth;


class ClientRepository implements ClientRepositoryInterface
{
	use UserNotification;

	public function getAllClients(array $params)
	{
		$clients = User::where('role_id', '=', 8)->orderBy('created_at', 'desc');
		if ( $params['name'] !== 'undefined') { 
			$clients = $clients->where('firstname', 'LIKE', '%' . $params['name'] . '%');
		 }

		return ClientResource::collection($clients->get());
	}	  

	public function getClientById($client_id) {

		$clients = User::findOrFail($client_id);
		return new ClientResource($clients);
	}

	public function addClient(array $params) {

		$user = new User;
		$user->firstname = $params['firstname'];
		$user->lastname = $params['lastname'];
		$user->email = $params['email'];
		$user->role_id =  8;
		$user->password = bcrypt('password');
		$user->save();

		if ( $user->save() ) {
			$details = new UserDetail;
			$details->user_id  = $user->id;
			$details->address1  = $params['address1'];
			$details->address2  = $params['address2'];
			$details->cell_phone  = $params['cell_phone'];
			$details->work_phone  = $params['work_phone'];
			$details->city  = $params['city'];
			$details->state  = $params['state'];
			$details->zip = $params['zipcode'];
			$details->dob = Carbon::parse($params['dob'])->format('Y-m-d');
			$details->language = $params['language'];
			$details->nationality = $params['nationality'];
			$details->save();
		}

		if ( $user->save() ) {

			$service = new ServiceDetail;
			$service->user_id = $user->id;
			$service->authorized_start_date = Carbon::parse($params['authorized_start_date'])->format('Y-m-d');
			$service->days_of_authorized_service = $params['days_of_authorized_service'];
			$service->hours_of_authorized_service = $params['hours_of_authorized_service'];
			$service->total_authorized_hours = $params['total_authorized_hours'];
			$service->start_date_of_service = Carbon::parse($params['start_date_of_service'])->format('Y-m-d');
			$service->total_days_to_start_service = $params['total_days_to_start_service'];
			$service->save();
		}


		if ( $user->save()) {

			$emergency = new EmergencyContact;
			$emergency->user_id = $user->id;
			$emergency->name = $params['emergency_contact_fullname'];
			$emergency->email = $params['emergency_contact_email'];
			$emergency->phone_number = $params['emergency_contact_phone_number'];
			$emergency->save();

		}

		if ( $user->save()) {

			$physician = new Physician;
			$physician->user_id = $user->id;
			$physician->name = $params['physician_name'];
			$physician->email = $params['physician_email'];
			$physician->phone_number = $params['phone_number'];
			$physician->save();

		}

		if ( $user->save() ) {

			$insurance = new ClientInsurance;
			$insurance->client_id = $user->id;
			$insurance->insurance_id = $params['insurance'];
			$insurance->save();
		}

 		return [
 			'status' => true
 		];
	}

	public function updateClient($clientId, array $newDetails) {}

	/**
	 * this function assigne a case coordincation to a client
	 * @param  [type] $params [description]
	 * @return [type]         [description]
	 */
	public function assignCoord(array $params) 
	{
		$clientcoord = new ClientCoord;
		$clientcoord->client_id = $params['client_id'];
		$clientcoord->coord_id = $params['coord_id'];
		$clientcoord->save();

		if ( $clientcoord->save()) {

			$client = $this->notify($params['client_id'], 'Case Coordinator');
			$coordinator = $this->notify( $params['coord_id'], 'Client');

			return [
				'notify_client' => $client,
				'notify_coord' => $coordinator,
				'status' => 'Success',
				'message' => 'Coordinator was successfully assigned'
			];
		}
	}

	/**
	 * this funciton assign a Nurse to a client
	 * @param  [type] $params [description]
	 * @return [type]         [description]
	 */
	public function assignNurse (array $params ) 
	{

		$clientnurse = new ClientNurse;
		$clientnurse->client_id = $params['client_id'];
		$clientnurse->nurse_id = $params['nurse_id'];
		$clientnurse->save();

		if( $clientnurse->save()) {
			
			$client = $this->notify($params['client_id'], 'Nurse');
			$coordinator = $this->notify( $params['nurse_id'], 'Client');

			return [
				'notify_client' => $client,
				'notify_nurse' => $coordinator,
				'status' => 'Success',
				'message' => 'A Nurse was successfully assigned'
			];
		}
	}

	public function assignHomecareworker(array $params) {

		$clientHomecare = new ClientHomecareworker;
		$clientHomecare->client_id = $params['client_id'];
		$clientHomecare->homecareworker_id = $params['hcw_id'];
		$clientHomecare->added_by = Auth::user()->id;
		$clientHomecare->save();

		if ( $clientHomecare->save()) {
			
			$client = $this->notify($params['client_id'], 'Home Care Worker');
			
			$coordinator = $this->notify( $params['hcw_id'], 'Client');

			return [
				'notify_client' => $client,
				'notify_homecareworker' => $coordinator,
				'status' => 'Success',
				'message' => 'A Nurse was successfully assigned'
			];
		}
	}

	/**
	 * this function unassign a nurse frm a client
	 * @param  array  $array [description]
	 * @return [type]        [description]
	 */
	public function unassign_nurse( array $array) {

		$clientNurse = ClientNurse::where('nurse_id', '=', $array['nurse_id'])->first();
		
		$clientNurse->delete();

		if( $clientNurse->delete() ){

			//Notifi both users
			$client = $this->unassign_notify($array['client_id'], 'Nurse');
			$nurse = $this->unassign_notify($array['nurse_id'], 'Client');

			return ['status' => $client ];
		}
	}

	/**
	 * this function Un Assign Cordinator from Client
	 * @param  array  $array [description]
	 * @return [type]        [description]
	 */
	public function unassign_coord( array $array) {

		$clientcoord =  ClientCoord::where('coord_id', '=', $array['coord_id'])->first();
		if ( $clientcoord->delete() ) {
			//Notifi both users
			$client = $this->unassign_notify($array['client_id'], 'Case Coordinator');
			$coord = $this->unassign_notify($array['coord_id'], 'Client');
			return [];
		}
	}

	/**
	 * this function unassign hoemcare worker
	 * @param  array  $array [description]
	 * @return [type]        [description]
	 */
	public function unassign_homecareworker( array $array ) {

		$clientHomecare = ClientHomecareworker::where('homecareworker_id', '=', $array['hcw'])->first();
		$clientHomecare->delete();

		if ( $clientHomecare->delete() )  {
			//Notifi both users
			$client = $this->unassign_notify($array['client_id'], 'Home Care Worker');
			$coord = $this->unassign_notify($array['hcw_id'], 'Client');
			return [];
		}

	}


}
?>