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
}
