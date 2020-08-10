<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $guarded = [];

    public function books()
    {
        return $this->hasMany('App\Books', 'pub_id', 'id');
    }
}
