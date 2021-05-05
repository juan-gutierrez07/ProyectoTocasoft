<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Auditoria;

class AuditoriaController extends Controller
{
    public function show()
    {
        $registros = Auditoria::all();
        $filtros =0;
        return view('auditoria.show',compact('registros','filtros'));
    }

    public function filtro(Request $request)
    {
        $request->validate([
            'fechainicio' => 'required',
            'fechafinal' => 'required|after:fechainicio'
        ]);
        $filtros = Auditoria::whereDate('created_at','>=',$request->fechainicio)->whereDate('created_at','<=',$request->fechafinal)->get();
        
        return view('auditoria.filtro',compact('filtros'))  ;
        
    }
}
