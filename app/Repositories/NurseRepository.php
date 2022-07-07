<?php 
namespace App\Repositories;

use App\Interfaces\NurseRepositoryInterface;
use App\Models\User;
use App\Http\Resources\NurseResource;

class NurseRepository implements NurseRepositoryInterface {

	public function getAllNurses(array $params) {

		$nurses = User::where('role_id', '=', 6)->orderBy('id','desc');


		if ( $params['name'] !== 'undefined' ) {
			$nurses = $nurses->where('firstname', 'LIKE', '%' . $params['name'] . '%');
		} 

		return NurseResource::collection($nurses->get());
	} 

	public function addNurse(array $array) {

	}
} 


 ?>