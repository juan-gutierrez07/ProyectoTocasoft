<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class CommentsPlace extends Model
{
    protected $fillable = [
        'place_id','user_id','content', 'points',

    ];
    public function places()
    {
        return $this->belongsTo('App\Modelos\Place');
        
    }
}
