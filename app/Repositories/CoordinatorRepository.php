<?php 
namespace App\Repositories;

use App\Interfaces\CoordinatorRepositoryInterface;
use App\Services\Notification\NotificationService;
use App\http\Resources\CoordinatorResource;
use App\Models\CoordinatorHomecareworker;
use App\Models\User;
use Auth;

class CoordinatorRepository implements CoordinatorRepositoryInterface {

	/**
	 * ---------------------------------------------------------
	 * THIS FUNCTION GET USER 
	 * ---------------------------------------------------------
	 * @param  array  $array [description]
	 * @return [type]        [description]
	 */
	public function get_coordinator( array $params) 
	{
		$coordinators = User::where('role_id', '=', 3);

		if ( $params['name'] !== 'undefined') {
			$coordinators = $coordinators->where('firstname', 'LIKE', '%' . $params['name'] . '%');
		}

		return CoordinatorResource::collection($coordinators->get());
	}

	public function get_coordinator_by_id($coord_id) {}

	public function store_coordinator( array $array) {}

	public function assign_homecareworker(array $request) {

		$coordinator = new CoordinatorHomecareworker;

		$coordinator->coord_id = $request['coord_id'];
		$coordinator->homecarework_id = $request['hc_worker_id'];
		$coordinator->added_by = Auth::user()->id;
		$coordinator->save();

		if ($coordinator->save()) {

			$notification = new NotificationService;
			$notification->notify_coord($request['coord_id']);
			$notification->notify_homecareworker($request['hc_worker_id']);

			return [
				'status' => 'Success',
				'message' => 'coordinator was successfully assigned'
			];
		}

	}
}

 ?>