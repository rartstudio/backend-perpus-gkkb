<?php

namespace App\Http\Resources\TransactionDetails;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TransactionDetailsCollection extends ResourceCollection
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
            'data' => TransactionDetailResource::collection($this->collection),
            'meta' => [
                'transaction_details_total' => $this->collection->count()
            ]
        ];
    }
}
