<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Auditoria;

class AuditoriaController extends Controller
{
    public function show()
    {
        $auditoria = Auditoria::all();

        return view('auditoria.show',compact('$auditoria'));
    }
}
