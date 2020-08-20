<?php

namespace App\Http\Resources\Publishers;

use Illuminate\Http\Resources\Json\JsonResource;

class PublishersResource extends JsonResource
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
            'name' => $this->pub_name
        ];
    }
}
