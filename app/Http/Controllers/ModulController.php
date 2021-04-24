<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Modul;
use App\Modelos\PublicactionState;
use App\Modelos\ArticlesAll;
use App\Modelos\EventPlace;
use App\Modelos\Category;
use DB;
use Carbon\Carbon;
class ModulController extends Controller
{
    public function all()
    {   
        $categorias = Category::all()->where('type','Sitios');
        $modulos = Modul::all();
        $sitios = Modul::where('slug','Sitios')->get()->first();
        $currentDateTime = date("Y-m-d H:i:s");
        $listEventCurrent = EventPlace::where("start","<=", $currentDateTime)->where("end",">=", $currentDateTime)->get();
        return view('principal.template',compact('modulos','categorias','sitios','listEventCurrent'));
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