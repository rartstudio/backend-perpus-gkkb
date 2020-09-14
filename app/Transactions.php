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
}
