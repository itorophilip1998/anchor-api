<?php

namespace App\Http\Controllers\Api;

use Spatie\Activitylog\Models\Activity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ActivityLogCollection;
use App\Models\User;
use Response;


class ActivityLogController extends Controller
{
    public function index(Request $request) {

        $response = array();

        $activities = Activity::get();

        foreach( $activities as $activity ) {

            $response[] = array(
                'id' => $activity->id,
                'description' => $activity->description,
                'created_at' => $activity->created_at,
                'user' => User::with('roles')->where('uuid', '=', $activity->causer_id)->first(),
            );

        }

        return Response::json( $response );
    }

}
