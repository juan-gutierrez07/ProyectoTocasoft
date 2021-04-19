<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    protected $fillable = [
        'name', 'slug','description','user_id','state_publication_id'

    ];
    public function users()
    {
        return $this->belongsTo('App\User');
    }
    public function articles()
    {
        return $this->hasMany('App\Modelos\ArticlesAll','modul_id');
    }
    public function abous_us()
    {
        return $this->hasMany('App\Modelos\AbousUs','modul_id');
    }
    public function state_publication()
    {
        return $this->belongsTo('App\Modelos\StatePublication');
    }
}
