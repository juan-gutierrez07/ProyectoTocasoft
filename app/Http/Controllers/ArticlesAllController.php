<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\ArticlesAll;
use App\Modelos\Modul;

class ArticlesAllController extends Controller
{
    public function index(Modul $modul)
    {
        
        return view('modulos.listarcontenido',compact('modul'));
    }

    public function store(Request $request)
    {
        dd($request);
    }
}
