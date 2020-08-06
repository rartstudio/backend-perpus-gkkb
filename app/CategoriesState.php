<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriesState extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(Members::class);
    }
}
