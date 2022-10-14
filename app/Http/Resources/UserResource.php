<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Auth;

class UserResource extends JsonResource
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
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'fullname' => $this->firstname.' '.$this->lastname,
            'email' => $this->email,
            'role' => $this->role, 
            'status' => $this->status,
            // 'role_name' => $this->role->name,
            'notification_counts' => Auth::user()->unreadNotifications->count(),
            'notifications' => Auth::user()->notifications//unreadNotifications
        ];
    }
}
