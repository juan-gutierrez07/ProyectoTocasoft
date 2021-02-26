<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class CommentsRoute extends Model
{
    protected $fillable = [
        'content', 'points',

    ];

    public function tuoristroutes()
    {
        return $this->belongsTo('App\Modelos\TuoristRoute','tuorist_route_id');
    }
}
