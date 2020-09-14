<?php

namespace App\Http\Resources\Auth;

use App\Http\Resources\Member\MemberResource;
use App\Http\Resources\Transaction\TransactionResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'details' => new MemberResource($this->members),
            'transactions' => TransactionResource::collection($this->whenLoaded('transactions')),
        ];
    }
}
