<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\IncidentRepositoryInterface;
use App\Models\IncidentType;
use App\Services\Incident\IncidentTypeService;
use App\Services\Incident\ReasonService;
use App\Services\Incident\ActivityService;

class IncidentController extends Controller
{
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
}
