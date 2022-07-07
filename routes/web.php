<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/notify', function() {
    
     $user = \App\Models\User::find(6);
     $cc_user = \App\Models\User::find(2);
     
     $details = [
        'greeting' => $cc_user->firstname, 
        'body' => 'This is our example notification tutorial', 
        'thanks' => 'Thank you for visiting codechief.org!',
    ];
    $user->notify(new \App\Notifications\TaskComplete($details));
});

Route::get('/markAsRead', function(){
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('mark');
