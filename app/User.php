<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'img_path',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function rss()
    {
        return $this->hasMany('App\Rss', 'user_id', 'id');
    }

    public function isOnline()
    {
        return \Illuminate\Support\FacaCache::has('user-is-online-' . $this->id);
    }

}
