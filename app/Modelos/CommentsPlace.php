<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class CommentsPlace extends Model
{
    protected $fillable = [
        'content', 'points',

    ];
    public function places()
    {
        return $this->belongsTo('App\Modelos\Place','place_id');
        
    }
}
