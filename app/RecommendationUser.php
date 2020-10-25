<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecommendationUser extends Model
{
    use SoftDeletes;

    protected $table = 'recommendation_user';

    protected $guarded =[];

    public function book()
    {
        return $this->belongsTo('App\Books', 'book_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
