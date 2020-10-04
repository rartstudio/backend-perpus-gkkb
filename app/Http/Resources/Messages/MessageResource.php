<?php

namespace App\Http\Resources\Messages;

use App\Http\Resources\Auth\AuthResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
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
            'header' => $this->header,
            'message' => $this->message,
            'sender' => $this->admin_id,
            'details' => new UserResource($this->user),
        ];
    }
}
