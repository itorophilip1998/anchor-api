<?php

namespace App\Http\Resources\Clients;

use Carbon\Carbon;
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
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'name' => $this->first_name . ' ' . $this->last_name,
            'email' => $this->email,
            'dob' => Carbon::parse($this->dob)->format('d-m-Y'),
            'gender' => $this->gender,
            'sexuality' => $this->sexuality,
            'nationality' => $this->nationality,
            'home_phone' => $this->home_phone,
            'work_phone' => $this->work_phone,
            'cell_phone' => $this->cell_phone,
            'racial_identity' => $this->racial_identity,
            'marital_status' => $this->marital_status,
            'ethnicity' => $this->ethnicity,
            'spoken_languages' => json_decode($this->spoken_languages),
            'preferred_languages' => json_decode($this->preferred_languages),
            'nationality' => $this->nationality,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'zip' => $this->zip,
            'residence_country' => $this->residence_country,
            'status' => $this->status ? 'Active' : 'Inactive',
            'is_active' => (bool) $this->status,
            'physician' => $this->physician,
            'insurance' => $this->insurance,
            'health_data' => $this->health,
            'proxies' => ClientProxyResource::collection($this->proxies),
            'nurse' => $this->nurse,
            'homecareworker' => $this->homecareworker,
            'coordinator' => $this->coordinator,
            'primary_hospital' => $this->primary_hospital,
            'closest_hospital' => $this->closest_hospital,
            'pharmacy' => $this->pharmacy,
        ];
    }
}
