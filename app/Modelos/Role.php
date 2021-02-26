<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //

    protected $fillable = [
        'rolname', 'slug','descripcion','full-accesses',

    ];

    public function users(){
        return $this->belongsToMany('App\User')->withPivot('role_id', 'user_id');
        
    }

    public function permission(){
        return $this->belongsToMany('App\Modelos\Permission')->withPivot('role_id', 'permission_id');
        
    }
}
