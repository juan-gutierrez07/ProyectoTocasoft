<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'slug','type',

    ];
   
    public function places()
    {
        return $this->hasMany('App\Modelos\Place','category_id');
    }

    public function routeturist()
    {
        return $this->belongsToMany('App\Modelos\TuoristRoute')->withPivot('tuorist_route_id', 'category_id');
    }

    
    // Leer las rutas por slug
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
