<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    protected $fillable = [
        'name', 'content_html','params',

    ];
    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
