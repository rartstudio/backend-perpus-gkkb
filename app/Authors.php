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
        return $this->hasMany(Books::class);
    }
}
