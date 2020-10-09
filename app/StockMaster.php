<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockMaster extends Model
{
    use SoftDeletes;

    protected $table = 'stock_master';

    protected $guarded = [];

    public function book()
    {
        return $this->belongsTo('App\Books','book_id','id');
    }


}
