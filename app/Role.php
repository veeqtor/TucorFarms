<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //

    function user()
    {
        return $this->hasOne('App\User');
    }
}
