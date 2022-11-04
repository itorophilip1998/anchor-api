<?php

use App\Http\Controllers\Api\Users\UserEducationDetailsController;
use App\Http\Controllers\Api\Users\UserEmergencyContactsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Users API Routes
|--------------------------------------------------------------------------
|
|
*/

Route::prefix('user')->middleware('auth:sanctum')->group(function(){

    Route::prefix('emergency-contacts')
        ->controller(UserEmergencyContactsController::class)->group(function(){

            Route::post('', 'store');
            Route::get('/{id}', 'show');
            Route::post('/{id}/update', 'update');
            Route::post('/{id}/delete', 'destroy');

        });

        Route::prefix('education-details')
        ->controller(UserEducationDetailsController::class)->group(function(){

            Route::post('', 'store');
            Route::get('/{id}', 'show');
            Route::post('/{id}/update', 'update');
            Route::post('/{id}/delete', 'destroy');

        });
});

