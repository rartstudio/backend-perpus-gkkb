<?php

namespace App\Http\Resources\Transaction;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TransactionCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => TransactionResource::collection($this->collection),
            'meta' => [
                'transactions_total' => $this->collection->count()
            ]
        ];
        
    }
}
