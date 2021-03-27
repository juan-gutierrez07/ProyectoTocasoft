<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $fillable = [
        'location',
        'id_establecimiento',
    ];

    // public function banners()
    // {
    //     return $this->belongsToMany('App\Modelos\Banner')->withPivot('images_id', 'banner_id');

    // }
}
