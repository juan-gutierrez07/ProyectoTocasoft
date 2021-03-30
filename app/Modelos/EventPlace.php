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
    public function places()
    {
        return $this->belongsTo('App\Modelos\Places');
    }
}
