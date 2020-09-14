<?php

namespace App\Http\Resources\TransactionDetails;

use App\Http\Resources\Books\BookResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionDetailResource extends JsonResource
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
            'transaction_id' => $this->transaction_id,
            'book_id' => $this->book_id,
            'details' => new BookResource($this->book),
            'state' => $this->state,
            'qty' => $this->qty,
        ];
    }
}
