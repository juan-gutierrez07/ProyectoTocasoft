<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    
    protected $fillable = [
        'name',
        'category_id',
        'direccion',
        'lat',
        'lng',
        'telefono',
        'descripcion',
        'imagen_principal',
        'apertura',
        'cierre',
        'uuid'
    ];
    public function category()
{
    return $this->belongsTo('App\Modelos\Category');
}
public function routetuorist(){
    return $this->belongsToMany('App\Modelos\TuoristRoute')->withPivot('place_id', 'tuorist_route_id');
    
}
public function commentsplace()
{
    return $this->hasMany('App\Modelos\CommentsPlace');
}


}
