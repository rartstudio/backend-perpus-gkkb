<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecomendationBooks extends Model
{
    use SoftDeletes;

    protected $guarded= [];

    public function book()
    {
        return $this->belongsTo('App\Books', 'book_id', 'id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
