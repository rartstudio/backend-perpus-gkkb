<?php

namespace App\Http\Resources\Transaction;

use App\Http\Resources\TransactionDetails\TransactionDetailResource;
use Carbon\Carbon;
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

        $returned_at = 0;

        if(is_null($returned_at) != 1){
            $returned_at = Carbon::parse($this->returned_at)->diffInDays();
        }

        return [
            'id' => $this->id,
            'transaction_code' => $this->transaction_code,
            'stated' => $this->state,
            'qty_borrow' => $this->qty_borrow,
            'qty_returned' => $this->qty_returned,
            'add_info' => $this->add_info,
            'borrowed_at' => Carbon::parse($this->borrowed_at)->format('d M Y H:i:s'),
            'returned_at' => Carbon::parse($this->returned_at)->format('d M Y H:i:s'),
            'created_at' => Carbon::parse($this->created_at)->format('d M Y H:i:s'),
            'transaction_details' => TransactionDetailResource::collection($this->whenLoaded('transaction_details')),
            'is_late' => $returned_at.' '.'hari'
            // 'transaction_details' => 1
        ];
    }
}
