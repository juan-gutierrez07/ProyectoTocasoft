<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class EventPlace extends Model
{
    protected $fillable = [
        'name',
        'descripcion',
        'start',
        'finish',
        'place_id',
    ];
    public function place()
    {
        return $this->belongsTo('App\Modelos\Place');
    }
}
