<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    protected $fillable = [
        'name', 'slud','params_content','user_id'

    ];
    public function users()
    {
        return $this->belongsTo('App\User');
    }
    public function articles()
    {
        return $this->hasMany('App\Modelos\ArticlesAll','modul_id');
    }
}
