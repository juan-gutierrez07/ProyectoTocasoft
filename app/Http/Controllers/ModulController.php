<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Modul;
use App\Modelos\PublicactionState;
use App\Modelos\ArticlesAll;

class ModulController extends Controller
{
    public function all()
    {   
        $articulos = ArticlesAll::where('modul_id','=',1)
                                ->where('state_publication_id','=',1)
                                ->get();
        return view('principal.template',compact('articulos'));
    }
}