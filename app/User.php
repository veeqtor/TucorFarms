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
        'fname',
        'lname',
        'gender',
        'address',
        'address2',
        'is_active',
        'role_id',
        'phone',
        'delivery',
        'payment',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    function role()
    {
        return $this->belongsTo('App\Role');
    }


    function purchase(){
        return $this->hasMany('App\Purchase');
    }
    /**
     * check for admin
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->role->type == 'admin' ? true : false;
    }

}



