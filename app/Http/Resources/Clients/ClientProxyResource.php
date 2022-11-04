<?php

namespace App\Http\Resources\Clients;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientProxyResource extends JsonResource
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
            'id'    => $this->id,
            'client_id' => $this->client_id,
            'proxy' => strtoupper($this->proxy),
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'relationship' => $this->relationship,
            'phone' => $this->phone,
            'email' => $this->email,
        ];
    }
}
