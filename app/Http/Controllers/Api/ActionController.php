<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Incident\ActionService;

class ActionController extends Controller
{
    private $actions;

    public function __construct( ) {
    }

    /**
     *  List all follow-up actions
     * @return [type] [description]
     */
    public function index(){
        return (new ActionService)->get_all_actions();
    }

    /**
     * Create follow-up action 
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Request $request) {}

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
}
