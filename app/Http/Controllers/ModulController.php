<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Modul;
use App\Modelos\PublicactionState;
use App\Modelos\ArticlesAll;
use App\Modelos\Category;

class ModulController extends Controller
{
    public function all()
    {   
        $categorias = Category::where('type','Sitio')->get();
        $articulos = ArticlesAll::where('modul_id','=',1)
                                ->where('state_publication_id','=',1)
                                ->get();
        return view('principal.template',compact('articulos','categorias'));
    }
    public function show()
    {
        $cantidades =[];
        $modulos =  Modul::all();
        // for ($i=0; $i <count($modulos->articles) ; $i++) { 
        //     $cantidades[i]= Arti
        // }
        
        
        return view('modulos.listarmodulos',compact('modulos','cantidades'));
    }
}