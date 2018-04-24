<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    //
    protected $fillable = [
        'user_id', 'purchases', 'reference_id', 'received'
    ];


    protected $casts = [
        'purchases' => 'json'
    ];


    function user()
    {
        return $this->hasOne('App\User');
    }

}
