<?php

namespace App\Http\Resources\Complaint;

use Illuminate\Http\Resources\Json\JsonResource;

use Carbon\Carbon;

class ComplaintResource extends JsonResource
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
        return [
            'id' => $this->id,
            'cuid' => $this->cuid,
            'nurse'=> $this->nurse,
            'isNurseVisit' => $this->isNurseVisit,
            'isFileReviewed' => $this->isFileReviewed,
            'dateReported' => Carbon::parse($this->date_reported)->toFormattedDateString(),
            'dateOfOccurrence' => Carbon::parse($this->occurrence_date)->toFormattedDateString(),
            'reportTimeline' => $this->report_timeline,
            'clientRelationship' => $this->client_relationship,
            'isCluster' => $this->cluster,
            'complaintHours' => $this->complaint_hours,
            'complaintTime' => $this->complaint_time,
            'desc' => $this->description,
            'isRoutineService' => $this->isRoutineServiceIssue,
            'complaintType' => $this->type->load(['investigation', 'action']),
            'status' => $this->status,
            'client' => $this->client,
            'created_at' => Carbon::parse($this->created_at)->diffForHumans(),
            'added_by' => $this->user,
            'category' => $this->category,
            // 'investigations' => $this->type->load('investigation'),
            // 'action' => $this->type->load('action')
        ];
    }
}

