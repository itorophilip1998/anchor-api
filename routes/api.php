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
use App\Http\Controllers\Api\ActivityController;
use App\Http\Controllers\Api\ComplaintController;

use App\Services\Incident\ActionService;
use App\Http\Controllers\Api\InvestigationController;

use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\ActivityLogController;
use App\Http\Controllers\Api\clients\ClientController as ClientsClientController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
*/

/* * Logouts Routes **/
Route::post('login', [UserController::class, 'login']);

/*** Registeration Routes* */
Route::post('register', [UserController::class, 'register']);

/*** Logout Routes ***/
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');

/** User Permissions Routes */
Route::group(['prefix' => 'permission', 'middleware' => 'auth:sanctum'], function() {
    Route::post('/update-role/{id}', [PermissionController::class, 'updateUserPermission']);
    Route::post('/role',          [PermissionController::class, 'createRole']);
    Route::post('/role/{id}',       [PermissionController::class, 'updateRole']);
    Route::get('/users/{id}',       [PermissionController::class, 'roleUser']);
    Route::post('/selected',        [PermissionController::class, 'usersByRoles']);
    Route::get('/userNotIn/{id}',   [PermissionController::class, 'roleUserNotIn']);
    Route::post('/change',          [PermissionController::class, 'changeRole']);
    Route::get('/roles', [PermissionController::class, 'fetchAllRoles']);
});


Route::group(['prefix' => 'abilities', 'middleware' => 'auth:sanctum'], function() {
    Route::get('', [PermissionController::class, 'index']);
});

Route::group(['prefix' => 'activity', 'middleware' => 'auth:sanctum'], function() {
    Route::get('', [ActivityLogController::class, 'index']);
});

/** * Statues  Routes * */
Route::group(['prefix' => 'statuses', 'middleware' => 'auth:sanctum'], function() {
    Route::get('', [StatusController::class, 'index']);
    Route::post('/edit-user/{id}', [StatusController::class, 'editUserStatus']);
});

/** *Home Care Worker Routes * */
Route::group(['prefix' => 'homecareworkers', 'middleware' => 'auth:sanctum'], function() {
    Route::get('', [HomecareController::class, 'index']);
    Route::get('/{id}', [HomecareController::class, 'show']);
    Route::post('', [HomecareController::class, 'store']);
});

/* * Coordinators Routes* */
Route::group(['prefix' => 'coordinators', 'middleware' => 'auth:sanctum'], function() {
    Route::get('', [CoordinatorController::class, 'index']);
    Route::post('/assign-homecareworker', [CoordinatorController::class, 'assign']);
});

/** *User Routes* */
Route::group(['prefix' => 'user', 'middleware' => 'auth:sanctum'], function() {
    Route::get('/details', [UserController::class, 'details']);
    Route::get('/roles', [UserController::class, 'roles']);
    Route::get('/roles/{id}', [UserController::class, 'roleDetails']);
    Route::post('/create', [UserController::class, 'store']);
    Route::get('/all', [UserController::class, 'all']);
    Route::get('/details/{id}', [UserController::class, 'userDetails']);
});



/** * Nurses Routes* */
Route::group(['prefix' => 'nurses', 'middleware' => 'auth:sanctum'], function() {
    Route::get('', [NurseController::class, 'index']);
    Route::get('/delete', [NurseController::class ,'destroy']);
});

/** * Action Incident Action routes* */
Route::group(['prefix' => 'actions', 'middleware' => 'auth:sanctum'], function() {

    Route::get('', [ActionController::class, 'index']);
    Route::get('/recommendations', [ActionController::class, 'recommendation']);
    Route::post('/store-action-results', [ActionController::class, 'store_action_result']);
    Route::post('/save-result',[ ActionController::class, 'storeResult']  );

    Route::post('save-recommendations', [ActionController::class, 'storeRecommendation']);
    Route::post('/save-selected-recommendation', [ActionController::class, 'saveSelectdRecommendation']);

});

/** * Incident Routes * **/
Route::group(['prefix' => 'incidents', 'middleware' => 'auth:sanctum'], function() {
    // Route::get('/incident-activity-details/{id}', [ActivityController::class, 'details']);

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

/** * Investigations Routes* **/
Route::group(['prefix' => 'investigations', 'middleware' => 'auth:sanctum'], function() {

    Route::post('/store-activity-result', [ActionController::class, 'store_activity_result']);
    Route::get('/activity/{id}', [ActivityController::class, 'details']);
    Route::post('/ ', [ActivityController::class, 'storeResult']);
    Route::post('/select_activity', [ActivityController::class, 'selectActivity']);
    Route::get('/types', [InvestigationController::class, 'investigaitonType']);

});

/** * Complaints Routes * **/
Route::group(['prefix' => 'complaints', 'middleware' => 'auth:sanctum'], function() {

    Route::get('/investigations', [ComplaintController::class, 'investigations']);

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


/**
 * ********************************************************************************
 * Task Route --
 * ********************************************************************************
 */
Route::group(['prefix' => 'tasks', 'middleware' => 'auth:sanctum'], function() {
    // Route::post('/store-task', [TaskController::class, 'store']);
    Route::post('/store-tasks', [TaskController::class, 'store']);
    Route::get('/taskslist',      [TaskController::class, 'taskslist']);
    Route::get('/taskselected',   [TaskController::class, 'taskselected']);

    Route::post('/escalate-task', [TaskController::class, 'storeEscalation']);
    //Route::post('/draft-sub-tasks', [TaskController::class, 'draftSubTask']);

    Route::post('/templates',      [TaskController::class, 'indexTaskTemplate']);
    Route::get('/modules',         [TaskController::class, 'taskModules']);
    Route::get('/categories',      [TaskController::class, 'taskCategories']);
    Route::get('/field-templates', [TaskController::class, 'taskFieldTemplate']);

    Route::get('/details/{id}',    [TaskController::class, 'taskTemplateDetails']);
    Route::get('/template/fields/{id}', [TaskController::class, 'taskFieldGenerate']);
    Route::get('/fields/details/{id}',   [TaskController::class, 'taskFieldDetails']);

    //update task status
    //Route::post('/submit-task', [TaskController::class, 'draftSubTask']);
    //Route::post('/review-task', [TaskController::class, 'draftSubTask']);
    //Route::post('/reassign-task', [TaskController::class, 'draftSubTask']);

    //old
    //Route::post('/save-action-response', [ComplaintController::class, 'saveActionResponse']);
    //update re-assign
    //Route::post('/save-action-response', [ComplaintController::class, 'saveActionResponse']);
    //update escalate
    //Route::post('/save-action-response', [ComplaintController::class, 'saveActionResponse']);
    //update redo
    //Route::post('/save-action-response', [ComplaintController::class, 'saveActionResponse']);
});


// Route::post('/taskslist',      [TaskController::class, 'taskslist']);



