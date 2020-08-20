<?php

namespace App\Http\Resources\CategoriesBook;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoriesBookCollection extends ResourceCollection
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
            'data' => CategoriesBookResource::collection($this->collection),
            'meta' => [
                'categories_book_total' => $this->collection->count()
            ]
        ];
    }
}
