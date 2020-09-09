<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Member\MemberResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'added' => new MemberResource($this->member),
        ];
    }
}
