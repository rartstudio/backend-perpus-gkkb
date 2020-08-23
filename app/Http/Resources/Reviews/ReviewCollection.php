<?php

namespace App\Http\Resources\Reviews;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ReviewCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => ReviewResource::collection($this->collection),
            'meta' => [
                'publishers_total' => $this->collection->count()
            ]
        ];
    }
}
