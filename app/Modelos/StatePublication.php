<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class StatePublication extends Model
{
    protected $fillable = [
        'status',
    ];

    public function articles()
    {
        return $this->hasMany('App\Modelos\ArticlesAll','state_publication_id');
    }
    public function moduls()
    {
        return $this->hasMany('App\Modelos\Modul','state_publication_id');
    }
}
