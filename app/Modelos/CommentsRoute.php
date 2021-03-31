<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class CommentsRoute extends Model
{
    protected $fillable = [
        'content', 'points',

    ];

    public function tuorist_routes()
    {
        return $this->belongsTo('App\Modelos\TuoristRoute');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
