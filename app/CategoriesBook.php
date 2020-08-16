<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriesBook extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function books()
    {
        return $this->hasMany('App\Books', 'cbo_id', 'id');
    }
}
