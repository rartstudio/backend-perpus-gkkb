<?php

namespace App\Http\Resources\CategoriesBook;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoriesBookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->cbo_name
        ];
    }
}
