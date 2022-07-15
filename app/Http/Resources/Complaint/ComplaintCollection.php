<?php

namespace App\Http\Resources\Complaint;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ComplaintCollection extends ResourceCollection
{

    public static $wrap = null;
    
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->sortByDesc('id'),
            'links' => [
                'self' => 'link-value'
            ]
        ];
        
    }
}
