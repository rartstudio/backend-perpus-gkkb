<?php

namespace App\Http\Resources\Authors;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AuthorCollection extends ResourceCollection
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
            'data' => AuthorResource::collection($this->collection),
            'meta' => [
                'authors_total' => $this->collection->count()
            ]
        ];
    }
}
