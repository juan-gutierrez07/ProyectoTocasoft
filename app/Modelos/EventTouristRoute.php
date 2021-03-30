<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class EventTouristRoute extends Model
{
    protected $fillable= [
        'name',
        'descripcion',
        'start',
        'finish',
        'tourist_route_id',
    ];
}
