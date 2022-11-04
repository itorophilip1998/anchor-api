<?php

namespace App\Http\Resources\HomecareWorkers;

use App\Http\Resources\Users\UserDetailsResource;
use Illuminate\Http\Resources\Json\JsonResource;

class HomecareWorkerResource extends JsonResource
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
            'id' => $this->uuid,
            'uuid' => $this->uuid,
            'name' => $this->firstname . " " . $this->lastname,
            'firstname' => $this->firstname,
            'middlename' => $this->middlename,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'status_id' => $this->status_id,
            'status' => $this->status,
            'created_at' => $this->created_at->format('d-m-Y'),
            'detail' => new UserDetailsResource($this->detail),
            'emergency_contacts' => $this->emergencyContacts,
            'education_details' => $this->educationDetails,
            'education' => $this->educationDetails->first() ?? null
        ];
    }
}
