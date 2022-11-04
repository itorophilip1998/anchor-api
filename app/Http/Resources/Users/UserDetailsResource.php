<?php

namespace App\Http\Resources\Users;

use Illuminate\Http\Resources\Json\JsonResource;

class UserDetailsResource extends JsonResource
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
            'user_id' => $this->user_id,
            'preferred_name' => $this->preferred_name,
            'address1' => $this->address1,
            'address2' => $this->address2,
            'living_situation' => $this->living_situation,
            'floor' => $this->floor,
            'living_alone' => (bool) $this->living_alone,
            'living_with' => $this->living_with,
            'home_phone' => $this->home_phone,
            'work_phone' => $this->work_phone,
            'cell_phone' => $this->cell_phone,
            'city' => $this->city,
            'state' => $this->state,
            'zip' => $this->zip,
            'county' => $this->county,
            'residence_country' => $this->residence_country,
            'gender' => $this->gender,
            'sexuality' => $this->sexuality,
            'racial_identity' => $this->racial_identity,
            'ethnicity' => $this->ethnicity,
            'marital_status' => $this->marital_status,
            'dob' => $this->dob,
            'ssn' => $this->ssn,
            'languages' => $this->languages,
            'nationality' => $this->nationality,
        ];
    }
}
