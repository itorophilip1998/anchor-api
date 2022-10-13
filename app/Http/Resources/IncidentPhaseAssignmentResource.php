<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IncidentPhaseAssignmentResource extends JsonResource
{
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
            'phase' => $this->incidentPhase,
            'assigned_to_name' => $this->user ? $this->user->firstname . ' ' . $this->user->lastname : null,
            'assigned_to' => $this->user,
        ];
    }
}
