<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class CommentsPlace extends Model
{
    protected $fillable = [
        'place_id','user_id','content', 'points',

    ];
    public function place()
    {
        return $this->belongsTo('App\Modelos\Place');
        
    }
    public function user()
    {
        return $this->belongsTo('App\User');
        
    }
}
