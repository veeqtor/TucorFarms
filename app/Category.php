<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{


    protected $fillable = [
        'type',
        'CSKU'
    ];


    //One category belongs to many products
    function product()
    {
        return $this->belongsToMany('App\Product');
    }

}
