<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thumbnail extends Model
{
    //
    protected $thumbnail_path = '/img/thumbnails/';

    protected $fillable = [

        'thumbName'
    ];

    //accessor
    public function getThumbNameAttribute($thumb)
    {
        return $this->thumbnail_path . $thumb;
    }
}
