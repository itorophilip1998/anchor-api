<?php

namespace App\Http\Resources\Task;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskFieldResource extends JsonResource
{
    
    // remove data wrap from api calls
    public static $wrap = null;

    /**
     * Transform the resource into an array.
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request){
        return [
            'id' => $this->id,
            'uid' => $this->id,
            'task_template_id' => $this->task_template_id,
            'caption' => $this->caption,
            'elements' => $this->element
        ];
    }
}

