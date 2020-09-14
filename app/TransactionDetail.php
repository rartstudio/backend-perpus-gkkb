<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $guarded = [];

    public function transaction()
    {
        return $this->belongsTo('App\Transaction','transaction_id','id');
    }

    public function book()
    {
        return $this->belongsTo('App\Books','book_id','id');
    }
}
