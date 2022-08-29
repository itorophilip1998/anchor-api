<?php 
namespace App\Repositories;

use App\Interfaces\HomecareRepositoryInterface;
use App\Http\Resources\ClientResource;
use App\Http\Resources\HomecareworkerResource;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\WorkDetail;
use App\Models\MedicalDetail;
use Carbon\Carbon;

class HomecareworkerRepository implements HomecareRepositoryInterface
{

	public function getHomecareworkers( array $params ) 
	{
		$homecareworkers = User::where('role_id', '=', 7)->orderBy('created_at', 'desc');

		if ( $params['name'] !== 'undefined' ) {
			$homecareworkers = $homecareworkers->where('firstname', 'LIKE', '%' . $params['name'] . '%');
		} 
		
		return ClientResource::collection($homecareworkers->get());
	}


	public function getHomecareworkerById($id) 
	{
		$homecareworkers = User::findOrFail($id);

		return new HomecareworkerResource($homecareworkers);
	}

	/**
	 * [addHomecareWorker description]
	 * @param array $params [description]
	 */
	public function addHomecareWorker( array $params ) {

		$user = new User;
		$user->firstname = $params['firstname'];
		$user->lastname = $params['lastname'];
		$user->email = $params['email'];
		$user->role_id =  7;
		$user->password = bcrypt('password');
		$user->save();

		if ( $user->save()) {
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


			if ( $details->save()) {
				$workDetails = new WorkDetail;
				$workDetails->user_id = $user->id;
				$workDetails->schedule_preference = $params['schedule_preference'];
				$workDetails->location_preference = $params['location_preference'];
				$workDetails->start_date = $params['start_date'];
				$workDetails->license_status = $params['license_status'];
				$workDetails->timesheet = $params['timesheet'];
				$workDetails->save();
			}

			if ( $details->save()) { 	
				$medical = new MedicalDetail;
				$medical->user_id = $user->id;
				$medical->medical_status = $params['medical_status'];
				$medical->in_service_status = $params['in_service_status'];
				$medical->covid_vaccine_status = $params['covid_vaccine_status'];
				$medical->flu_vaccine_status = $params['flu_vaccine_status'];
				$medical->save();

				return [
					'status' => 'Success',
				];
			}
			
		}
	}

	/**
	 * this function update Homecare In t                       j
	 * @param  [type] $userId [description]
	 * @param  array  $params [description]
	 * @return [type]         [description]
	 */
	public function updateHomecareworker($userId, array $params) {

	}
}

 ?>