<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\ClientNurse;
use App\Models\ClientCoord;
use App\Models\ClientHomecareworker;
use App\Models\User;

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
        // return parent::toArray($request);
        return [
            'id' => $this->uuid,
            'name' => $this->firstname.' '.$this->lastname,
            'email' => $this->email,
            'role' => $this->role, 
            'status' => $this->status,
            'role_name' => $this->role->name,
            'detail' => $this->detail,
            'nurse' => $this->get_nurse_information($this->uuid),
            'cc'=> $this->get_coord_information($this->uuid),
            'homecareworker' => $this->get_homecareworker($this->iuud)
        ];
    }

    public function get_nurse_information($id) {

        $nurse = new ClientNurse;

        $assign_nurse = $nurse->where('client_id', '=', $id)->first();

        if($assign_nurse ) {
            return User::find($assign_nurse->nurse_id)->load('detail');
        }
    }

    public function get_coord_information($id) {

        $cc_manage = new ClientCoord;

        $assign_cc = $cc_manage->where('client_id', '=', $id)->first();

        if( $assign_cc ) {
            return User::find($assign_cc->coord_id)->load('detail');
        }
    }

    public function get_homecareworker($id) {

        $homecareworker = new ClientHomecareworker;

        $hcw = $homecareworker->where('client_id', '=', $id )->first();

        if ( $hcw ) {
            return User::find($hcw->homecareworker_id)->load('detail');                     
        }
    }


}
