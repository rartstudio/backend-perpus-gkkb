<?php

namespace App\Http\Resources\CategoriesState;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoriesStateResource extends JsonResource
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
            'name' => $this->cst_name
        ];
    }
}
