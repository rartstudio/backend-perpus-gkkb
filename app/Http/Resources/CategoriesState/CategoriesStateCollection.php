<?php

namespace App\Http\Resources\CategoriesState;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoriesStateCollection extends ResourceCollection
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
            'data' => CategoriesStateResource::collection($this->collection),
            'meta' => [
                'categories_state_total' => $this->collection->count()
            ]
        ];
    }
}
