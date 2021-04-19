<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class AbousUs extends Model
{
    protected $fillable =
    [
        'name','position','phone','modul_id','imagen_location'
    ];
    public function modul()
    {
        return $this->belongsTo('App\Modelos\Modul');
    }
}
