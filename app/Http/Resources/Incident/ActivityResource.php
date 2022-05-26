<?php

namespace App\Http\Resources\Incident;

use Illuminate\Http\Resources\Json\JsonResource;

class ActivityResource extends JsonResource
{

    public static $wrap = null;

    // protected $with = ['result', 'response'];
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
           return[
                'id' => $this->id,
                'activity' => $this->activity,
                'results' => $this->result,
                'recommendations' => $this->recommendation
           ];
    }
}
