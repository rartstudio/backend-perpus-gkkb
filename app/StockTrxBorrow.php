<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockTrxBorrow extends Model
{
    use SoftDeletes;

    protected $table = 'stock_trx_borrow';

    protected $guarded = [];

    public function book()
    {
        return $this->belongsTo('App\Books','book_id','id');
    }

    public function borrow()
    {
        return $this->belongsTo('App\Transactions','transaction_id','id');
    }
}
