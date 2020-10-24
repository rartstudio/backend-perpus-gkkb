<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Member\MemberImageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ImageResource extends JsonResource
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
            'name' => $this->name,
            'details' => new MemberImageResource($this->members),
        ];
    }
}
