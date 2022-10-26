<?php

namespace App\Http\Resources\Clients;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
            'firstname' => $this->first_name,
            'last_name' => $this->last_name,
            'name' => $this->first_name . ' ' . $this->last_name,
            'email' => $this->email,
            'dob' => $this->dob,
            'gender' => $this->gender,
            'sexuality' => $this->sexuality,
            'nationality' => $this->nationality,
            'home_phone' => $this->home_phone,
            'work_phone' => $this->work_phone,
            'cell_phone' => $this->cell_phone,
            'address1' => $this->address1,
            'address2' => $this->address2,
            'city' => $this->city,
            'state' => $this->state,
            'zip' => $this->zip,
            'residence_country' => $this->residence_country,
            'status' => (bool) $this->status,
            'physician' => $this->physicianInformation,
            'service_information' => $this->serviceInformation,
            'nurse' => $this->nurse,
            'homecareworker' => $this->homecareworker,
            'coordinator' => $this->coordinator
        ];
    }
}
