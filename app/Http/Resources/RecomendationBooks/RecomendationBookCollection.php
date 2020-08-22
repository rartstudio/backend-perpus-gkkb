<?php

namespace App\Http\Resources\RecomendationBooks;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RecomendationBookCollection extends ResourceCollection
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
            'data' => RecomendationBookResource::collection($this->collection),
            'meta' => [
                'recomendation_books_total' => $this->collection->count()
            ]
        ];
    }
}
