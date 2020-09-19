<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Authors extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function books()
    {
        return $this->hasMany('App\Books','author_id','id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
