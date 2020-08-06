<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $guarded = [];

    public function author()
    {
        return $this->belongsTo(Authors::class);
    }

    public function category_book()
    {
        return $this->belongsTo(CategoriesBook::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function transaction_details()
    {
        return $this->hasMany(TransactionDetail::class);
    }
}
