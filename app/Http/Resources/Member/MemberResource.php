<?php

namespace App\Http\Resources\Member;

use Illuminate\Http\Resources\Json\JsonResource;

class MemberResource extends JsonResource
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
            'date_of_birth' => $this->date_of_birth,
            'date_of_baptism' => $this->date_of_baptism,
            'image' => $this->image,
            'gender' => $this->gender,
            'address' => $this->address,
            'phone_number' => $this->phone_number,
            'no_cst' => $this->no_cst,
            'is_verified' => $this->is_verified,
            'submission' => $this->submission
        ];
    }
}
