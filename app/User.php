<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //Este array de eloquent permite que solamente estos atributos sean visibles cuando se llama un modelo ya creado
    protected $fillable = [
        'name', 'password','email','status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    //Este array evita mostrar esta información del modelo cuando es llamado
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsToMany('App\Modelos\Role')->withPivot('role_id', 'user_id');
        
    }
    public function articles()
    {
        return $this->hasMany('App\Modelos\ArticlesAll');
    }

    public function moduls()
    {
        return $this->hasMany('App\Modelos\User');
    }

    public function havePermisson($permiso)
    {   
            foreach($this->roles as $rol)
            {
                if($rol['full-accesses']=='yes')
                {
                    return true;
                }

                foreach ($rol->permission as $permisos) 
                {
                    if($permisos['slug'] == $permiso)
                    {
                            return true;
                    }
                }
            }
     return false;
           
    }

}


