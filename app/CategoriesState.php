<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriesState extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function users()
    {
        return $this->hasMany('App\Members', 'cst_id', 'id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
