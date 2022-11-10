<?php

use App\Http\Controllers\Api\ActionController;
use App\Http\Controllers\Api\ActivityController;
use App\Http\Controllers\Api\IncidentController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for incident module. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/dashboard', [IncidentController::class, 'dashboard']);

/** * Incident Routes * **/
Route::group(['prefix' => 'incidents', 'middleware' => 'auth:sanctum'], function() {
    // Route::get('/incident-activity-details/{id}', [ActivityController::class, 'details']);
 
   // Route::get('/dashboard', [IncidentController::class, 'dashboard']);

    Route::post('update', [IncidentController::class, 'updateIncident']);
    Route::post('assign', [IncidentController::class, 'assignIncident']);

    Route::post('add-activity', [IncidentController::class, 'addIncidentActivity']);
    Route::post('add-activity-result', [IncidentController::class, 'addIncidentActivityResult']);
    Route::post('add-activity-recommendation', [IncidentController::class, 'addIncidentActivityRecommendation']);

    Route::post('resolve-incident', [IncidentController::class, 'resolveIncident']);
    Route::post('feedback', [IncidentController::class, 'storeFeedback']);

    Route::get('/locations', [IncidentController::class, 'fetchIncidentLocations']);

    Route::post('{id}/analysis', [IncidentController::class, 'saveIncidentAnalysis']);

    Route::get('/injuries', [IncidentController::class, 'fetchIncidentInjuries']);

    Route::post('/locations', [IncidentController::class, 'saveIncidentLocation']);

    Route::get('/case-types', [IncidentController::class, 'fetchIncidentCaseTypes']);

    Route::post('/case-types', [IncidentController::class, 'saveIncidentCaseType']);

    /** INVESTIGATION PART  */

    Route::get('{id}/fetch-investigation-questions', [IncidentController::class, 'fetchInvestigationQuestions']);
    // saveInvestigationResponses
    Route::post('/save-investigation-responses', [IncidentController::class, 'saveInvestigationResponses']);
    /** END INVESTIGATION PART */

    Route::get('/investigation-activities', [ActivityController::class, 'index']);
    Route::get('incident-acitivities', [ActionController::class, '_get_incident_activities']);
    Route::get('/activites', [ActionController::class, 'activity_action']);

    Route::get('/reasons-categories', [IncidentController::class, 'fetchIncidentReasonCategories']);


    Route::get('/reasons', [IncidentController::class, 'fetchAllReasons']);

    Route::post('/reasons', [IncidentController::class, 'storeIncidentReason']);
    Route::post('/reasons/update', [IncidentController::class, 'updateIncidentReason']);

    Route::post('/reasons/delete/{id}', [IncidentController::class, 'deleteIncidentReason']);

    Route::get('/incident-reasons/{id}', [IncidentController::class, 'get_incident_reason']);
    Route::post('/incident-reasons', [IncidentController::class, 'save_incident_reason']);
    Route::get('/types', [IncidentController::class, 'types']); // this is actually categories, and not types
    Route::get('/incident-types', [IncidentController::class, 'incidentTypes']);

    Route::post('/types', [IncidentController::class, 'storeIncidentType']);
    Route::post('/types/update', [IncidentController::class, 'updateIncidentType']);

    Route::post('/types/delete/{id}', [IncidentController::class, 'deleteIncidentType']);

    Route::post('/store-category', [IncidentController::class, 'storeIncidentCategory']);
    Route::post('/update-category', [IncidentController::class, 'updateIncidentCategory']);
    Route::post('/delete-category/{id}', [IncidentController::class, 'deleteCategory']);

    Route::post('/store-reason-category', [IncidentController::class, 'storeIncidentReasonCategory']);
    Route::post('/update-reason-category', [IncidentController::class, 'updateIncidentReasonCategory']);
    Route::post('/delete-reason-category/{id}', [IncidentController::class, 'deleteReasonCategory']);

    Route::get('/{id}', [IncidentController::class, 'details']);
    Route::get('/', [IncidentController::class, 'index']);
    Route::post('/', [IncidentController::class, 'store']);

    Route::post('/delete/{id}', [IncidentController::class, 'deleteIncident']);

    Route::post('/investigation-response', [IncidentController::class, 'store_investigation_response']);
    Route::post('save-activities', [IncidentController::class, 'save_incident_activity']);
    Route::get('/incident-typecategory/{id}', [IncidentController::class, 'incident_type_category']);
});