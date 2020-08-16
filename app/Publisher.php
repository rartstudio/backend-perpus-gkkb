<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publisher extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function books()
    {
        return $this->hasMany('App\Books', 'pub_id', 'id');
    }
}
