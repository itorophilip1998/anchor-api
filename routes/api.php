<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\StatusController;
use App\Http\Controllers\Api\HomecareController;
use App\Http\Controllers\Api\CoordinatorController;
use App\Http\Controllers\Api\NurseController;
use App\Http\Controllers\Api\IncidentController;
use App\Http\Controllers\Api\ActionController;

use App\Services\Incident\ReasonService;
use App\Services\Incident\ActionService;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');


Route::group(['prefix' => 'clients', 'middleware' => 'auth:sanctum'], function () {

   Route::get('', [ClientController::class, 'index']);
   Route::post('store',[ClientController::class, 'store']);
   Route::get('/details/{id}', [ClientController::class, 'details']);
   
   Route::post('/assign-coordinator', [ClientController::class, 'assign_coordinator']);
   Route::post('/assign-nurse', [ClientController::class, 'assign_nurse']);
   Route::post('/assign-homecareworker', [ClientController::class, 'assign_hcw']);

   Route::post('/unassign-nurse', [ClientController::class, 'unassign_nurse']);
   Route::post('/unassign-coord', [ClientController::class, 'unassign_coord']);
   Route::post('/unassign-homecareworker', [ClientController::class, 'unassign_homecareworker']);
});

Route::group(['prefix' => 'statuses', 'middleware' => 'auth:sanctum'], function() {
    Route::get('', [StatusController::class, 'index']);
    Route::post('/edit-user/{id}', [StatusController::class, 'editUserStatus']);
});

Route::group(['prefix' => 'homecareworkers', 'middleware' => 'auth:sanctum'], function() {
    Route::get('', [HomecareController::class, 'index']);
    Route::get('/{id}', [HomecareController::class, 'show']);
    Route::post('', [HomecareController::class, 'store']);
});

Route::group(['prefix' => 'coordinators', 'middleware' => 'auth:sanctum'], function() {
    Route::get('', [CoordinatorController::class, 'index']);
    Route::post('/assign-homecareworker', [CoordinatorController::class, 'assign']);
});

Route::group(['prefix' => 'user', 'middleware' => 'auth:sanctum'], function() {
    Route::get('/details', [UserController::class, 'details']);
});

Route::group(['prefix' => 'nurses', 'middleware' => 'auth:sanctum'], function() {
    Route::get('', [NurseController::class, 'index']);
    Route::get('/delete', [NurceController::class ,'destroy']);
});


Route::group(['prefix' => 'actions', 'middleware' => 'auth:sanctum'], function() {
    Route::get('', [ActionController::class, 'index']);
    Route::get('/recommendations', [ActionController::class, 'recommendation']);
});

Route::group(['prefix' => 'incidents', 'middleware' => 'auth:sanctum'], function() { 

    Route::get('/incident-reasons/{id}', [IncidentController::class, 'get_incident_reason']);
    Route::post('/incident-reasons', [IncidentController::class, 'save_incident_reason']);
    Route::get('/types', [IncidentController::class, 'types']);
    Route::get('/{id}', [IncidentController::class, 'details']);
    Route::get('/', [IncidentController::class, 'index']);
    Route::post('/', [IncidentController::class, 'store']);
    Route::post('/investigation-response', [IncidentController::class, 'store_investigation_response']);
    Route::post('save-activities', [IncidentController::class, 'save_incident_activity']);
    Route::get('/incident-typecategory/{id}', [IncidentController::class, 'incident_type_category']);

}); 