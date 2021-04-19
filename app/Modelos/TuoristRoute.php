<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class TuoristRoute extends Model
{
    protected $fillable = [
        'name','time_travel','description','uuid','category_id'

    ];
    public function places(){
        return $this->belongsToMany('App\Modelos\Place')->withPivot('tuorist_route_id', 'place_id');
        
    }
    public function categoryrouteturism()
    {
        return $this->belongsTo('App\Modelos\Category');
    }

    public function commentsroute()
    {
        return $this->hasMany('App\Modelos\CommentsRoute','tuorist_route_id');
    }
    // public function banners()
    // {
    //     return $this->belongsTo('App\Modelos\Banner','banner_id');
    // }
}
