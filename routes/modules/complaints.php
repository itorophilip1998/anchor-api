<?php

use App\Http\Controllers\Api\ComplaintController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for complaints module. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/** * Complaints Routes * **/
Route::group(['prefix' => 'complaints', 'middleware' => 'auth:sanctum'], function() {

    Route::get('/investigations', [ComplaintController::class, 'investigations']);

    Route::get('/investigation-types', [ComplaintController::class, 'investigationTypes']);

    Route::get('categories', [ComplaintController::class, 'getAllCategory']);
    Route::get('/', [ComplaintController::class, 'index']);

    Route::get('/types', [ComplaintController::class, 'fetchAllCategoryType']);

    Route::get('/{id}', [ComplaintController::class, 'show']);
    
    Route::post('/store-category-type/{id}', [ComplaintController::class, 'storeCategoryType']);
    Route::post('/', [ComplaintController::class, 'store']);

    Route::post('/delete/{id}', [ComplaintController::class, 'deleteComplaint']);

    Route::post('store-category', [ComplaintController::class, 'storeCategory']);

    Route::post('/update-category', [ComplaintController::class, 'updateCategory']);

    Route::post('/delete-category/{id}', [ComplaintController::class, 'deleteCategory']);


    Route::post('types', [ComplaintController::class, 'storeType']);

    Route::post('/types/update', [ComplaintController::class, 'updateType']);

    Route::post('/types/delete/{id}', [ComplaintController::class, 'deleteType']);


    Route::get('/category-types/{id}', [ComplaintController::class, 'getComplaintType']);


    Route::post('/save-action-response', [ComplaintController::class, 'saveActionResponse']);
    Route::post('/save-investigation-response', [ComplaintController::class, 'saveInvestigationResponse']);
    Route::post('/assign-nurse-complaints', [ComplaintController::class, 'assignNurse']);
});