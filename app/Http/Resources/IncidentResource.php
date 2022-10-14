<?php

namespace App\Http\Resources;

use App\Services\Investigation\InvestigationService;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Services\Incident\IncidentType;
use App\Services\Incident\ActivityService;
use Carbon\Carbon;
use App\Http\Resources\ActivityResource;
use App\Models\Incident;
use App\Models\IncidentPhase;

class IncidentResource extends JsonResource
{

     public static $wrap = null;
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
            'id'   => $this->id,
            'iuid' => $this->iuid,
            'nurse' => $this->nurse,
            'nurse_name' => $this->nurse->firstname.' '.$this->nurse->lastname,
            'coord_name' => $this->coord->firstname.' '.$this->coord->lastname,
            'coord_involved' => $this->coord_involved,
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
            'created_at'        => Carbon::parse($this->created_at)->format('d M, Y'),//->diffForHumans(),
            'client_name'       => $this->client->firstname.' '.$this->client->lastname,
            'client'            => $this->client,
            'reasons'           => $this->reason,
            'reason_response'   => $this->reason_response,
            'investigations'    => $response,
            'activities'        => $this->activity->load('result'),
            'homecareworker'    => $this->hcw,
            'analysis'          => $this->analysis,
            'investigation_responses' => $this->investigation_responses,
            'investigation_responses_count' => $this->investigation_responses->count(), // quick fixx for frontend, to check if to show button , or show details
            'actions' => $this->action,
            'actions_count' => $this->action->count(),
            'selected_actions' => $this->selectedActions,
            'resolution'    => $this->resolution,
            'days_taken'    => $this->days_taken,
            'feedback'  => $this->feedback,
            'injury_id'    => $this->analysis->injury_id ?? null,
            'location_id' => $this->analysis->incident_location_id ?? null,
            'case_type_id' => $this->analysis->incident_case_type_id ?? null,
            'description' => $this->analysis->description ?? null,
            'analysis_assignment' => array('id' => IncidentPhase::ANALYSIS, 'assignment' => new IncidentPhaseAssignmentResource($this->getAnalysisAssignment())),
            'investigation_assignment' => array('id' => IncidentPhase::INVESTIGATION, 'assignment' => new IncidentPhaseAssignmentResource($this->getInvestigationAssignment())),
            'resolution_assignment' => array('id' => IncidentPhase::RESOLUTION, 'assignment' => new IncidentPhaseAssignmentResource($this->getResolutionAssignment())),
            'incident_phase_assignments' => IncidentPhaseAssignmentResource::collection($this->incidentPhaseAssignments)
        ];
    }

}
 