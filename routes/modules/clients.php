<?php

use App\Http\Controllers\Api\clients\ClientController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Clients API Routes
|--------------------------------------------------------------------------
|
|
*/
Route::prefix('clients')->middleware('auth:sanctum')
    ->controller(ClientController::class)->group(function(){

    Route::get('', 'index');

    Route::post('', 'store');

    Route::get('/{id}', 'show');

    Route::post('/{id}/update', 'update');

    Route::post('/{id}/delete', 'delete');

    Route::post('/{id}/service-information', 'saveServiceInformation');

    Route::post('/{id}/physician-information', 'savePhysicianInformation');

    Route::post('/{id}/assign-nurse', 'assignNurse');

    Route::post('/{id}/unassign-nurse', 'unassignNurse');

    Route::post('/{id}/assign-homecareworker', 'assignHomecareworker');

    Route::post('/{id}/unassign-homecareworker', 'unassignHomecareworker');

    Route::post('/{id}/assign-coordinator', 'assignCoordinator');

    Route::post('/{id}/unassign-coordinator', 'unassignCoordinator');
});

// Route::group(['prefix' => 'clients', 'middleware' => 'auth:sanctum'], function () {

//     Route::get('', [ClientController::class, 'index']);
//     Route::post('store',[ClientController::class, 'store']);
//     Route::get('/details/{id}', [ClientController::class, 'details']);
 
//     Route::post('/assign-coordinator', [ClientController::class, 'assign_coordinator']);
//     Route::post('/assign-nurse', [ClientController::class, 'assign_nurse']);
//     Route::post('/assign-homecareworker', [ClientController::class, 'assign_hcw']);
 
//     Route::post('/unassign-nurse', [ClientController::class, 'unassign_nurse']);
//     Route::post('/unassign-coord', [ClientController::class, 'unassign_coord']);
//     Route::post('/unassign-homecareworker', [ClientController::class, 'unassign_homecareworker']);
//  });