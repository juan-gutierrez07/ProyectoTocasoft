<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

    
    protected $fillable = [
        'name', 'slug','descripcion',

    ];
    public function roles(){
        return $this->belongsToMany('App\Modelos\Role')->withPivot('role_id', 'permission_id');
        
    }
}
