<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\CoordinatorHomecareworker;
use App\Models\User;

class HomecareworkerResource extends JsonResource
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
            'name' => $this->firstname.' '.$this->lastname,
            'email' => $this->email,
            'role' => $this->role, 
            'status' => $this->status,
            'address1' => $this->detail->address1,
            'address2' => $this->detail->address2,
            'state' => $this->detail->state,
            'city' => $this->detail->city,
            'dob' => $this->detail->dob,
            'zip' => $this->detail->zip,
            'role_name' => $this->role->name,
            'medical' => $this->medical,
            'gender' => $this->detail->gender,
            'work' => $this->work,
            'cc' => $this->get_coordinator($this->id)
        ];
    }

    public function get_coordinator($userId) {

        $cc = new CoordinatorHomecareworker;

        $assign_cc = $cc->where('homecarework_id', '=', $userId)->first();

        if ( $assign_cc ) {
            return User::find( $assign_cc->coord_id )->load('detail');
        }

    }   
}
