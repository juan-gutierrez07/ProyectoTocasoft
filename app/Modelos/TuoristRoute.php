<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class TuoristRoute extends Model
{
    protected $fillable = [
        'time_travel'

    ];
    public function places(){
        return $this->belongsToMany('App\Modelos\Place')->withTimestamps();
        
    }
    public function categoryrouteturism()
    {
        return $this->belongsToMany('App\Modelos\Category')->withPivot('tuorist_route_id', 'category_id');
    }

    public function commentsroute()
    {
        return $this->hasMany('App\Modelos\CommentsRoute');
    }
    public function banners()
    {
        return $this->belongsTo('App\Modelos\Banner','banner_id');
    }
}
