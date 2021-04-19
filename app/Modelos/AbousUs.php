<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class AbousUs extends Model
{
    protected $fillable =
    [
        'name','lastname','position','phone','modul_id','imagen_location','email'
    ];
    public function modul()
    {
        return $this->belongsTo('App\Modelos\Modul');
    }
}
