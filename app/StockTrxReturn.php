<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockTrxReturn extends Model
{
    use SoftDeletes;

    protected $table = 'stock_trx_return';

    protected $guarded = [];

    public function return()
    {
        return $this->belongsTo('App\Transactions','transaction_id','id');
    }

    public function book()
    {
        return $this->belongsTo('App\Books','book_id','id');
    }
}
