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
        $modulos = Modul::where('state_publication_id','=',1)->get();
                
        return view('principal.template',compact('modulos','categorias'));
    }
    public function show()
    {
        $modulos =  Modul::all();
        return view('modulos.listarmodulos',compact('modulos'));
    }
    public function update(Request $request, Modul $modul)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required|min:20'
        ]);

        $modul->name= $request->name;
        $modul->description=$request->description;
        $modul->state_publication_id= $request->status;
        $modul->save();
        return redirect()->route('modul.show');
    }
}