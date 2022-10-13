<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\IncidentRepositoryInterface;
use App\Models\Action;
use App\Models\ClinicianRecommendation;
use App\Models\Incident;
use App\Models\IncidentActionRecommendation;
use App\Models\IncidentActionResult;
use App\Models\IncidentActionSelected;
use App\Models\IncidentAnalysis;
use App\Models\IncidentCaseType;
use App\Models\IncidentFeedback;
use App\Models\IncidentLocation;
use App\Models\IncidentPhase;
use App\Models\IncidentPhaseAssignment;
use App\Models\IncidentResolution;
use App\Models\IncidentType;
use App\Models\Injury;
use App\Models\InvestigationQuestion;
use App\Models\InvestigationResponse;
use App\Models\Reason;
use App\Models\ReasonCategory;
use App\Services\Incident\IncidentTypeService;
use App\Services\Incident\ReasonService;
use App\Services\Incident\ActivityService;
use Carbon\Carbon;
use App\Traits\UserNotification;

class IncidentController extends Controller
{
    use UserNotification;

    private $incident;
    private $reason;

    public function __construct(IncidentRepositoryInterface $incident, ReasonService $reason ) {
        $this->incident = $incident;
        $this->reason = $reason;
    }

    public function index(Request $request)  {
        $attributes = $request->all();
        return $this->incident->getIncidents($attributes);
    }

    /**
     * This function get incident details 
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function details( $id ) {
        return $this->incident->get_incident_details( $id );

    }
    /**
     * This function get incident types
     * NOTE: this is actually categories, and not type. Name should be changed
     * @return [type] [description]
     */
    public function types() {
        return $this->incident->getIncidentTypes();
    }

    public function store(Request $request) {
       
        $attributes = $request->all();
        return $this->incident->create_incident($attributes);
    }

    public function storeIncidentType(Request $request) {

        $attributes = $request->all();

        $type = new IncidentTypeService;

        return $type->createIncidentType($attributes);
    }

    public function deleteIncidentType($id) {

        $type = IncidentType::find($id);

        $type->delete();

        return array('message' => 'Incident Type deleted successfully');
    }

    public function updateIncidentType(Request $request) {

        $attributes = $request->all();

        $type = new IncidentTypeService;

        return $type->updateIncidentType($attributes);
    }

    public function storeIncidentReason(Request $request) {

        $attributes = $request->all();

        $reason = new Reason($attributes);

        $reason->save();

        return $reason;
    }

    public function deleteIncidentReason($id) {

        $reason = Reason::find($id);

        $reason->delete();

        return array('message' => 'Reason deleted successfully');
    }

    public function updateIncidentReason(Request $request) {

        $attributes = $request->all();

        $reason = Reason::find($attributes['id']);

        $reason->reason_category_id = $attributes['reason_category_id'];
        $reason->reason = $attributes['reason'];
        $reason->incident_type_id = $attributes['incident_type_id'];
        $reason->save();

        return $reason;
    }

    public function storeIncidentCategory(Request $request) {

        $attributes = $request->all();

        return $this->incident->createIncidentCategory($attributes);
    }

    public function updateIncidentCategory(Request $request) {

        $attributes = $request->all();

        return $this->incident->updateIncidentCategory($attributes);
    }

    public function deleteCategory($id) {

        return $this->incident->deleteIncidentCategory($id);
    }

    public function deleteIncident($id) {

        return $this->incident->deleteIncident($id);
    }

    public function fetchIncidentReasonCategories() {
        
        $categories = ReasonCategory::all();

        return $categories;
    }

    public function storeIncidentReasonCategory(Request $request) {

        $attributes = $request->all();

        $category = new ReasonCategory($attributes);

        $category->save();

        return $category;

    }

    public function updateIncidentReasonCategory(Request $request) {

        $attributes = $request->all();

        $category = ReasonCategory::find($attributes['id']);

        $category->name = $attributes['name'];

        $category->save();

        return $category;
    }

    public function deleteReasonCategory($id) {

        $category = ReasonCategory::find($id);

        return $category->delete();
    }

    public function fetchAllReasons() {
        
        return Reason::all();
    }

    public function fetchIncidentLocations() {
        
        $locations = IncidentLocation::all();

        return $locations;
    }

    public function fetchIncidentInjuries() {
        
        $injuries = Injury::all();

        return $injuries;
    }

    public function saveIncidentAnalysis($id, Request $request)
    {
        $input = $request->all();

        $incident = Incident::where('iuid', $id)->first();

        $incidentId = $incident->id;

        $incidentAnalysis = new IncidentAnalysis();
        $incidentAnalysis->incident_id = $incidentId;
        $incidentAnalysis->incident_case_type_id = $input['incident_case_type'];
        $incidentAnalysis->incident_location_id = $input['incident_location'];
        $incidentAnalysis->injury_id = $input['incident_injury'];
        $incidentAnalysis->description = $input['incident_description'];

        $incidentAnalysis->save();

        return $incidentAnalysis;

    }

    public function fetchInvestigationQuestions($id) {
        
        $incident = Incident::where('iuid', $id)->first();

        $incidentTypeId = $incident->incident_type;
        $reasonName = $incident->reason_response->reason;

        // im doing this because there's no link between incidentReason and Reason
        // reason name is saved, so i have to fetch to get the category for the reason
        // using the name only
        $reason = Reason::where('reason', $reasonName)->first();

        $reasonCategoryId = $reason->reason_category_id;

        // return array('type_id' => $incidentTypeId, 'cat_id' => $reasonCategoryId);

        $questions = InvestigationQuestion::where('incident_type_id', $incidentTypeId)
                                            ->where('reason_category_id', $reasonCategoryId)
                                            ->get();

        return $questions;
    }

    public function saveInvestigationResponses(Request $request) {
        
        $input = $request->all();

        $responses = InvestigationResponse::insert($input);

        return $responses;
    }

    public function saveIncidentLocation(Request $request)
    {
        $location = new IncidentLocation($request->all());

        $location->save();

        return $location;
    }

    public function saveIncidentCaseType(Request $request)
    {
        $caseType = new IncidentCaseType($request->all());

        $caseType->save();

        return $caseType;
    }

    public function fetchIncidentCaseTypes() {
        
        $caseTypes = IncidentCaseType::all();

        return $caseTypes;
    }

    /**
     * ****************************************************************
     * [save_incident_reason description]
     * ***************************************************************
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function save_incident_reason(Request $request) {
        $attributes = $request->all();
        return $this->reason->save_reasons($attributes);
    }

    /**
     * ***************************************************************
     * STORE INVESTGATION RESPONSE
     * ***************************************************************
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store_investigation_response(Request $request)  {
        $attributes = $request->all();
        return $this->reason->save_investigation($attributes);
    }

    /**
     * **********************************************************************
     * Thes functionn tie activity
     * **********************************************************************
     * @param  Request $request [description]
     * @return [type]           [description]
     * **********************************************************************
     */
    public function save_incident_activity(Request $request ) {
        $attributes = $request->all();
        return (new ActivityService)->store_incident_activity($attributes);
    }

    /**
     * ************************************************************************
     * [incident_activities description]
     * ************************************************************************
     * @param  [type] $id [description]
     * @return [type]     [description]
     * ************************************************************************
     */
    public function incident_activities($id) {
        return $this->incident->get_incident_activitie($id);
    }
        
    /**
     * [incident_type_category description]
     * @return [type] [description]
     */
    public function incident_type_category($id) {
        $type = new IncidentTypeService;
        return $type->get_incident_category($id) ;
    }

    /**
     * This method fetches all the incident types in the system, with its category
     * 
     * @return [type] [description]
     */
    public function incidentTypes() {
        $type = new IncidentTypeService;
        return $type->getIncidentTypes();
    }

    /**
     * [get_reasons description]
     * @return [type] [description]
     */
    public function get_reasons() {
        $incident_id = 1;
        return $this->reason->get_reason_by_incident_id($incident_id);
    }

    public function get_incident_reason ($id) {
         return $this->reason->get_reason_by_incident_id($id);
    }

    /**
     * =========================================================
     * 
     * NEW SECTION FOR ACTIVITIES
     * 
     *==========================================================
     */

     public function addIncidentActivity(Request $request) {

        $input = $request->all();

        $incidentCustomId = $input['incident_id'];

        $incident = Incident::where('iuid',$incidentCustomId)->first();
        $incidentId = $incident->id;

        $selectedAction = new IncidentActionSelected();
        $selectedAction->incident_id = $incidentId;
        $selectedAction->incident_action_id = $input['incident_action_id'];
        $selectedAction->datetime = \Carbon\Carbon::parse($input['activity_date']);

        // comment too possible
        $selectedAction->save();

        // now check if there are recommendations and results of action
        foreach ($input['recommendation_ids'] as $id) {

            $actionRecommendation = new IncidentActionRecommendation();
            $actionRecommendation->incident_id = $incidentId;
            $actionRecommendation->incident_action_selected_id = $selectedAction->id;
            $actionRecommendation->clinician_recommendation_id = $id;
            $actionRecommendation->recommended_by = auth()->user()->uuid;
    
            // get the result name from Action
            // using the result id
            $recommendation = ClinicianRecommendation::find($id);
            $actionRecommendation->recommendation = $recommendation->recommendation;
    
            $actionRecommendation->save();
        }

        foreach ($input['result_ids'] as $id) {
            $actionResult = new IncidentActionResult();
            $actionResult->incident_id = $incidentId;
            $actionResult->incident_action_selected_id = $selectedAction->id;
            $actionResult->result_id = $id;
    
            // get the result name from Action
            // using the result id
            $action = Action::find($id);
            $actionResult->result = $action->name;
    
            $actionResult->save();
        }

        return array('success' => true, 'message' => 'Added successfully');

     }

     public function addIncidentActivityResult(Request $request) {
        
        $input = $request->all();

        $incidentCustomId = $input['incidentId'];

        $incident = Incident::where('iuid',$incidentCustomId)->first();
        $incidentId = $incident->id;

        $actionResult = new IncidentActionResult();
        $actionResult->incident_id = $incidentId;
        $actionResult->incident_action_selected_id = $input['selectedActionId'];
        $actionResult->result_id = $input['selectedActionResultId'];

        // get the result name from Action
        // using the result id
        $action = Action::find($input['selectedActionResultId']);
        $actionResult->result = $action->name;

        // comment too possible
        if ($request->has('comment')) {
            $actionResult->comments = $input['comment'];
        }

        $actionResult->save();

        return array('success' => true, 'message' => 'Added successfully');

     }

     public function addIncidentActivityRecommendation(Request $request) {

        $input = $request->all();

        $incidentCustomId = $input['incidentId'];

        $incident = Incident::where('iuid',$incidentCustomId)->first();
        $incidentId = $incident->id;

        $actionRecommendation = new IncidentActionRecommendation();
        $actionRecommendation->incident_id = $incidentId;
        $actionRecommendation->incident_action_selected_id = $input['selectedActionId'];
        $actionRecommendation->clinician_recommendation_id = $input['selectedRecommendationId'];
        $actionRecommendation->recommended_by = auth()->user()->uuid;

        // get the result name from Action
        // using the result id
        $recommendation = ClinicianRecommendation::find($input['selectedRecommendationId']);
        $actionRecommendation->recommendation = $recommendation->recommendation;

        // comment too possible
        if ($request->has('comment')) {
            $actionRecommendation->comments = $input['comment'];
        }

        $actionRecommendation->save();

        return array('success' => true, 'message' => 'Added successfully');
     }

     public function resolveIncident(Request $request) {

        $input = $request->all();

        $incidentCustomId = $input['incident_id'];

        $incident = Incident::where('iuid',$incidentCustomId)->first();
        $incidentId = $incident->id;

        $resolution = new IncidentResolution();
        $resolution->incident_id = $incidentId;
        $resolution->resolution_status = $input['resolution_status'];
        $resolution->resolution_result = $input['resolution_result'];
        $resolution->is_resolved = $input['resolution_resolved'];
        $resolution->resolved_at = Carbon::parse($input['resolution_date']);
        $resolution->save();

        return array('success' => true, 'message' => 'Added successfully');
    }

    public function storeFeedback(Request $request) {

        $input = $request->all();

        $incidentCustomId = $input['incident_id'];

        $incident = Incident::where('iuid',$incidentCustomId)->first();
        $incidentId = $incident->id;

        $feedback = new IncidentFeedback();
        $feedback->incident_id = $incidentId;
        $feedback->feedback_hcw = $input['feedback_hcw'];
        $feedback->feedback_nurse = $input['feedback_nurse'];
        $feedback->feedback_agency = $input['feedback_agency'];
        $feedback->feedback_referral_response = $input['feedback_referral_response'];

        $feedback->save();

        return $feedback;

    }

    public function updateIncident(Request $request) {

        $input = $request->all();

        $incident = Incident::where('iuid', $input['incident_id'])->first();

        $incident->update($input);

        // update or create analysis (this is actually more information. Change table name)
        $analysis = IncidentAnalysis::UpdateOrCreate([
            'incident_id' => $incident->id,
            'injury_id'  => $input['incident_injury'],
            'incident_location_id' => $input['incident_location'],
            'description' => $input['incident_description'],
            'incident_case_type_id' => $input['incident_case_type']
        ]);

        $incident->refresh();

        return $incident;
    }

    public function assignIncident(Request $request) {
        
        $input = $request->all();

        $incident = Incident::where('iuid', $input['incident_id'])->first();
        $incidentId = $incident->id;
        $input['incident_id'] = $incidentId;

        $assignment = new IncidentPhaseAssignment($input);

        $assignment->save();

        $assignment->refresh();

        // notify the users
        $client = $this->notify($incident->client_id,'Incident Assignment', 'An Incident with the ID ' . $incident->iuid . ' has been assigned '.  $assignment->incidentPhase->name);
        $this->notify($incident->nurse_involved, 'Incident Assignment', 'An Incident with the ID ' . $incident->iuid . ' has been assigned for '.  $assignment->incidentPhase->name);
        $this->notify($incident->homecareworker, 'Incident Assignment', 'An Incident with the ID ' . $incident->iuid . ' has been assigned for '.  $assignment->incidentPhase->name);

        $this->notify($assignment->assigned_to,'Incident Assignment',  'An Incident with ID ' . $incident->iuid . ' has been assigned to you for ' . $assignment->incidentPhase->name);

        return $assignment;
    }
}
