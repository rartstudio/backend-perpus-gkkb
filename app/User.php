<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

//menggunakan trait yang disediakan laravel passport
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasRoles;

    //use it
    use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function members()
    {
        return $this->hasOne('App\Members','user_id','id');
    }

    public function transactions()
    {
        return $this->hasMany('App\Transactions','user_id','id');
    }
    
    public function review()
    {
        return $this->hasMany('App\ReviewBooks', 'user_id', 'id');
    }

    public function message()
    {
        return $this->hasMany('App\Messages', 'user_id', 'id');
    }
}
