<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class ArticlesAll extends Model
{
    protected $fillable =[
        'name',
        'descripcion',
        'state_publication_id',
        'modul_id',
    ];
    public function state_publication()
    {
        return $this->belongsTo('App\Modelos\StatePublication');
    }
    public function modul()
    {
        return $this->belongsTo('App\Modelos\Modul');
    }
}
