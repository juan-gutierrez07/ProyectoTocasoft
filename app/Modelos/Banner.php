<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'title', 

    ];
        public function images(){
            return $this->belongsToMany('App\Modelos\Images')->withPivot('images_id', 'banner_id');
        
    }
        public function tuoristroute()
    {
            return $this->hasOne('App\Modelos\TuoristRoute');
    }
}
