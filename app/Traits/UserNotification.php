<?php 
namespace App\Traits;

use Carbon\Carbon;
use App\Models\User;
use Auth;

trait UserNotification
{

	public function notify($user_id, $title =null, string $message ) {
		
		$user = User::find($user_id);

		$details = [
			'title' => $title,
			'body' => $message,
			'thanks' => 'Thank you for using Total Care Score (TCS)'
		];

		return $user->notify(new \App\Notifications\TaskComplete($details));
	}

	public function unassign_notify($user, $role) {

	}
}


 ?>