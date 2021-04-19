<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'slug',

    ];
   
    public function places()
    {
        return $this->hasMany('App\Modelos\Place','category_id');
    }

    public function routeturist()
    {
        return $this->hasMany('App\Modelos\TuoristRoute ','category_id');
    }

    
    // Leer las rutas por slug
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
