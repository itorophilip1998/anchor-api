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

Route::prefix('homecareworkers')->middleware('auth:sanctum')
    ->controller(HomecareWorkerController::class)->group(function(){

        Route::get('', 'index');
        Route::post('', 'store');
        Route::get('/{id}', 'show');
        Route::post('/{id}/update', 'update');
        Route::post('/{id}/delete', 'delete');
    });