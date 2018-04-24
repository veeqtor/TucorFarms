<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

    protected $fillable = [
        'item',
        'quantity',
        'price',
        'per',
        'SKU',
        'category_id',
        'thumbnail_id',
    ];


    //One product belongs to one category
    function category()
    {
        return $this->belongsTo('App\Category');
    }

    function thumbnail()
    {
        return $this->belongsTo('App\Thumbnail');
    }
}
