<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model
{
    protected $fillable =[
        'detail','user'
    ];
}
