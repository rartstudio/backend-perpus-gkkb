<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    protected $guarded = [];

    public function transaction_details()
    {
        return $this->hasMany('App\TransactionDetail','transaction_id','id');
    }

    public function users()
    {
        return $this->belongsTo('App\User','user_id','id');
    }    

    public function stock_out()
    {
        return $this->hasMany('App\StockTrxBorrow','transaction_id','id');
    }

    public function stock_in()
    {
        return $this->hasMany('App\StockTrxReturn','transaction_id','id');
    }
}
