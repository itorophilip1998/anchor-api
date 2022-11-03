<?php

use App\Http\Controllers\Api\HomecareWorkers\HomecareWorkerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Homecareworkers API Routes
|--------------------------------------------------------------------------
|
|
*/

/** *Home Care Worker Routes * */
// Route::group(['prefix' => 'homecareworkers', 'middleware' => 'auth:sanctum'], function() {
//     Route::get('', [HomecareController::class, 'index']);
//     Route::get('/{id}', [HomecareController::class, 'show']);
//     Route::post('', [HomecareController::class, 'store']);
// });
// homecareworkers
Route::prefix('homecareworkers')->middleware('auth:sanctum')
    ->controller(HomecareWorkerController::class)->group(function(){

        Route::get('', 'index');
        Route::post('', 'store');
        Route::get('/{id}', 'show');
        Route::post('/{id}/update', 'update');
        Route::post('/{id}/delete', 'delete');
    });