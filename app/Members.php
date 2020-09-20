<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Members extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    
    public function category_state()
    {
        return $this->belongsTo('App\CategoriesState', 'cst_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transactions::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getCover(){
        //checking if cover image from url
        if(substr($this->image,0,5) == "https"){
            return $this->image;
        }

        //checking if image from folder
        if($this->image){
            return asset($this->image);
        }

        //returning placeholder if image is null
        return 'https://via.placeholder.com/150x150.png?text=No+Cover';
    }
}
