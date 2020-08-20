<?php

namespace App\Http\Resources\Publishers;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PublishersCollection extends ResourceCollection
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
            'data' => PublishersResource::collection($this->collection),
            'meta' => [
                'publishers_total' => $this->collection->count()
            ]
        ];
    }
}
