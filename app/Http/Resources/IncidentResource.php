<?php

namespace App\Http\Resources;

use App\Services\Investigation\InvestigationService;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Services\Incident\IncidentType;
use App\Services\Incident\ActivityService;
use Carbon\Carbon;
use App\Http\Resources\ActivityResource;

class IncidentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $response = '';
        $activity = '';

        if ( $this->reason_response ) {
            $response = (new InvestigationService)->get_investigation_by_reason($this->reason_response->reason);
            // $activity = (new ActivityService)->get_activities_by_reason_response($this->reason_response->reason);
        }
       
        return [
            'iuid' => $this->iuid,
            'nurse' => $this->nurse,
            'nurse_name' => $this->nurse->firstname.' '.$this->nurse->lastname,
            'coord_name' => $this->coord->firstname.' '.$this->coord->lastname,
            'time' => $this->time,
            'date' => $this->date,
            'client_relation' => $this->client_relation,
            'hours_of_incident' => $this->hours_of_incident,
            'incident_level' => $this->incident_level,
            'isInsurance' => $this->isInsurance,
            'timeline' => $this->timeline,
            'resolve_time' => $this->resolution_timeline,
            'type' => $this->type,
            'category' => $this->category,
            'created_by' => $this->creator->firstname.' '.$this->creator->lastname,
            'created_at' => Carbon::parse($this->created_at)->diffForHumans(),
            'client_name' => $this->client->firstname.' '.$this->client->lastname,
            'reasons' => $this->reason,
            'reason_response' => $this->reason_response,
            'investigations' => $response,
            'activities' => $this->activity->load('result'),
            // 'actions' => $this->action->load('result')
        ];
    }

}
 