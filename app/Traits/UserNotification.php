<?php 
namespace App\Traits;

use Carbon\Carbon;
use App\Models\User;
use Auth;

trait UserNotification
{

	public function notify($user_id, string $role ) {
		
		$user = User::find($user_id);
		$auth = Auth::user();

		$details = [
			'greeting' => $auth->firstname.' '.$auth->lastname,
			'body' => 'A '.$role.' has been assigned to you',
			'thanks' => 'Thank you for useing Total Care Score (TCS)'
		];

		return $user->notify(new \App\Notifications\TaskComplete($details));
	}

	public function unassign_notify($user, $role) {

	}
}


 ?>