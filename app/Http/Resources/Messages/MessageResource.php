<?php

namespace App\Http\Resources\Messages;

use App\Http\Resources\Auth\AuthResource;
use App\Http\Resources\User\UserResource;
use Carbon\Carbon;
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
            'is_read' => $this->is_read,
            'created_at' => Carbon::parse($this->created_at)->format('d M Y H:i:s'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d M Y H:i:s'),
            'details' => new UserResource($this->user),
        ];
    }
}
