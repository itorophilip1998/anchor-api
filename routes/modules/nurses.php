<?php

use App\Http\Controllers\Api\Nurses\NursesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Nurses API Routes
|--------------------------------------------------------------------------
|
|
*/

Route::prefix('nurses')->middleware('auth:sanctum')
    ->controller(NursesController::class)->group(function(){

        Route::get('', 'index');
        Route::post('', 'store');
        Route::get('/{id}', 'show');
        Route::post('/{id}/update', 'update');
        Route::post('/{id}/delete', 'delete');
    });