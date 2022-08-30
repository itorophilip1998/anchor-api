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
    Route::post('/role/{id}',          [PermissionController::class, 'updateRole']);
    Route::get('/users/{id}',     [PermissionController::class, 'roleUser']);
    Route::get('/userNotIn/{id}', [PermissionController::class, 'roleUserNotIn']);
    Route::post('/change',        [PermissionController::class, 'changeRole']);
});


Route::group(['prefix' => 'abilities', 'middleware' => 'auth:sanctum'], function() {
    Route::get('', [PermissionController::class, 'index']);
});

/*** Clients Routes ***/
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
 
    Route::get('/investigation-activities', [ActivityController::class, 'index']);
    Route::get('incident-acitivities', [ActionController::class, '_get_incident_activities']);
    Route::get('/activites', [ActionController::class, 'activity_action']);
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
    
    Route::get('/{id}', [ComplaintController::class, 'show']);
    Route::post('/store-category-type/{id}', [ComplaintController::class, 'storeCategoryType']);
    Route::post('/', [ComplaintController::class, 'store']);
   
    Route::post('store-category', [ComplaintController::class, 'storeCategory']);
  
    Route::get('/category-types/{id}', [ComplaintController::class, 'getComplaintType']);
    Route::get('/category-types', [ComplaintController::class, 'fetchAllCategoryType']);

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
   
    Route::post('/store-task', [TaskController::class, 'store']);
    Route::post('/templates',      [TaskController::class, 'indexTaskTemplate']);    
    Route::get('/modules',         [TaskController::class, 'taskModules']);
    Route::get('/categories',      [TaskController::class, 'taskCategories']);
    Route::get('/field-templates', [TaskController::class, 'taskFieldTemplate']);
    Route::get('/details/{id}',    [TaskController::class, 'taskTemplateDetails']);
    Route::get('/template/fields/{id}', [TaskController::class, 'taskFieldGenerate']);
    Route::get('/fields/details/{id}',   [TaskController::class, 'taskFieldDetails']);
});


Route::post('/store-tasks', [TaskController::class, 'store']);