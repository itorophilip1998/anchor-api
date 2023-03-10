<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NurseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'id' => $this->uuid,
            'name' => $this->firstname.' '.$this->lastname,
            'email' => $this->email,
            'role' => $this->role,
            'status' => $this->status,
            'details' => $this->detail
        ];
    }
}
