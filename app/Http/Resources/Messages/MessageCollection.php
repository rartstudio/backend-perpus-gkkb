<?php

namespace App\Http\Resources\Messages;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MessageCollection extends ResourceCollection
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
            'data' => MessageResource::collection($this->collection),
            'meta' => [
                'messages_total' => $this->collection->count()
            ]
        ];
    }
}
