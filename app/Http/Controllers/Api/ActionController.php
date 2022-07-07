<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Incident\ActionService;
use App\Services\Incident\ActivityService;
use App\Services\Incident\RecommendationService;

class ActionController extends Controller
{
    private $actions;

    public function __construct( ) {
        // $this->actions = new Action;
    }

    /**
     *  List all follow-up actions
     * @return [type] [description]
     */
    public function index(){
        return (new ActionService)->get_all_actions();
    }

    public function _get_incident_activities() {
        return (new ActivityService)->index();
    }

    /**
     *THIS FUNCTION GET ALL ACTIVITIES
     * @return [type] [description]
     */
    public function activity_action() {
        return (new ActivityService)->index();
    }

    /**
     * [store_activity_result description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store_activity_result(Request $request) {

        $attributes = $request->all();
        return (new ActivityService)->saveActivityResult($attributes);
    }

    /**
     * Create follow-up action 
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Request $request) {}


    // public function store_action_result(Request $request) {
    //     $attributes = $request->all();
    //     return (new ActionService)->saveActivityResult( $attributes);
    // }

    /** this function store activitiy resu;lt */
    public function storeResult( Request $request ) {

       $attributes = $request->all();
        return (new ActivityService)->saveResult($attributes);
    }


    /**
     * Add follow-up actions to incident
     * @param Request $request [description]
     */
    public function add(Request $request, $id) {

        $attributes = $request->all();
        return $this->actions->apply_action($params, $id);
    }

    /**
     * list incident's follow-up actions
     * @return [type] [description]
     */
    public function list($id) {
        $incident_id = $id;
        return $this->actions->get_applied_action($incident_id);
    }


    public function recommendation() {
        return (new ActionService)->action_recommendations();
    }

    /**
     * this function store activity recommendations
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function storeRecommendation(Request $request) {
        $attributes = $request->all();
        return (new RecommendationService)->store_recommendation($attributes);
    }

    public function fetchRecommendation( $id ) {
        return (new RecommendationService)->index( $id );
    }
}
