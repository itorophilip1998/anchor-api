<?php 
namespace App\Services\Notification;

use App\Models\User;
use App\Notifications\TaskComplete;
use Auth;

class NotificationService 
{

	/**
	 * Basic notification class for testing
	 * @param  [type] $userId [description]
	 * @return [type]         [description]
	 */
	public function notify($userId)  {
	   $user = User::find($userId);
	   $details = [
	   		'greeting' => 'Hi Artisan',
            'body' => 'This is our example notification tutorial',
            'thanks' => 'Thank you for visiting codechief.org!',
	   ];
	   return $user->notify(new \App\Notifications\TaskComplete($details));
	}

	/**
	 * This is service send a notification to the coordinator
	 * @param  [type] $user_id [description]
	 * @return [type]          [description]
	 */
	public function notify_coord($user_id) {
       
       $cc_manager = User::find( $user_id );

       $hr = Auth::user();

       $details = [
       	 'greeting' => $hr->firstname.' '.$hr->lastname,
       	 'body' => 'A new Home Care Worker has been assign to you',
       	 'thanks' => 'Thank your for using Total Care Score (TCS) '
       ];

       return $cc_manager->notify(new \App\Notifications\TaskComplete($details));
	}

	/**
	 * this service send out a notification to the home care worker
	 * @param  [type] $user_id [description]
	 * @return [type]          [description]
	 */
	public function notify_homecareworker($user_id) {

	   $homecareworker = User::find( $user_id);

       $hr = Auth::user();

       $details = [
       	 'greeting' => $hr->firstname.' '.$hr->lastname,
       	 'body' => 'A Case Coordinator has been assign to you',
       	 'thanks' => 'Thank your for using Total Care Score (TCS) '
       ];

       return $homecareworker->notify(new \App\Notifications\TaskComplete($details));
	}

	/**
	 * Mark notification as read
	 * @return [type] [description]
	 */
	public function markAsRead() {
	   Auth::user()->unreadNotifications->markAsRead();
	}

}

?>