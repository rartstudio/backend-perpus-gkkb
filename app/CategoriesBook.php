<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriesBook extends Model
{
    protected $guarded = [];

    public function books()
    {
        return $this->hasMany(Books::class);
    }
}
