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

    public function categories_book()
    {
        return $this->belongsTo('App\CategoriesBook', 'cbo_id','id');
    }

    public function publisher()
    {
        return $this->belongsTo('App\Publisher', 'pub_id', 'id');
    }

    public function transaction_details()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    public function getCover(){
        //checking if cover image from url
        if(substr($this->cover,0,5) == "https"){
            return $this->cover;
        }

        //checking if cover from folder
        if($this->cover){
            return asset($this->cover);
        }

        //returning placeholder if image is null
        return 'https://via.placeholder.com/150x200.png?text=No+Cover';
    }
}
