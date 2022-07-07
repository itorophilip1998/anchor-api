<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Incident\ActivityService;

class ActivityController extends Controller
{
    
    private $activityService;

    public function __construct(ActivityService $activityService) {
        $this->activityService = $activityService;
    }

    public function index() {
        return $this->activityService->index();
    }

    public function details( $id ) {
        return (new ActivityService)->get_activity_by_id($id);
    }

    /**
     * ********************************************************************
     * THIS FUNCTION STORE RESULT
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function storeResult( Request $request ) {
        $attributes = $request->all();
        return (new ActivityService)->saveActivityResult($attributes);
    }

    /**
     * SELECT ACTIVITY
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function selectActivity( Request $request ) {

        $attributes = $request->all();
        return (new ActivityService)->SaveSelectActivity( $attributes );
    }

}
