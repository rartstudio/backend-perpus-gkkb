<?php

namespace App\Http\Resources\Transaction;

use App\Http\Resources\TransactionDetails\TransactionDetailResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
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
            'transaction_code' => $this->transaction_code,
            'state' => $this->state,
            'qty_borrow' => $this->qty_borrow,
            'qty_returned' => $this->qty_returned,
            'returned_at' => $this->returned_at,
            'borrowed_at' => $this->borrowed_at,
            'created_at' => $this->created_at,
            'transaction_details' => TransactionDetailResource::collection($this->whenLoaded('transaction_details')),
            // 'transaction_details' => 1
        ];
    }
}
