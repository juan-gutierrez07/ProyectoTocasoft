<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Modelos\AbousUs;
use App\Modelos\Modul;
use DB;
use Carbon\Carbon;
class AbousUsController extends Controller
{
    public function store(Request $request,Modul $modul)
    {
        $request->validate([
            'name'=>'required|max:20',
            'lastname' => 'required|max:20',
            'position' => 'required|min:5',
            'phone'=>'required',
            'imagen_principal' => 'required|max:2000',
            

        ]);
        $path_imagen = $request->file('imagen_principal')->store('personal_alcaldia', 'public');

        //Resize imagen
        $imagen = Image::make( public_path("storage/{$path_imagen}"))->fit(700, 1200);
        $imagen->save();

        $personal = new AbousUs();
        $personal->name= $request->name;
        $personal->lastname= $request->lastname;
        $personal->position =$request->position;
        $personal->phone = $request->phone;
        $personal->imagen_location = $path_imagen;
        $personal->modul_id = $modul->id;
        if($request->get('email')){
            $personal->email = $request->email;
        }else{
            $personal->email = "No tiene";
        }
        
        $personal->save();
        DB::table('auditorias')->insert([
            'detail' => 'Creación del Personal'. " ". $personal->name ." " .$personal->lastname,
            'user' => auth()->user()->name . " " ."|" .auth()->user()->roles[0]->rolname,
            'created_at'=>Carbon::now(),
        ]);
        return redirect()->route('articles.show',$modul->id)
        ->with('status_success','Contenido Agregado !!'); ;   
    }
    public function update(Request $request, AbousUs $abousus)
    {
        $request->validate([
            'name'=>'required|max:20',
            'lastname' => 'required|max:20',
            'position' => 'required|min:5',
            'phone'=>'required',
            'imagen_principal' => 'max:2000',

        ]);
        if($request->get('imagen_principal')) 
        {
                 //leer imagen
        $path_imagen = $request->file('imagen_principal')->store('personal_alcaldia', 'public');

        //Resize imagen
        $imagen = Image::make( public_path("storage/{$path_imagen}"))->fit(700, 1200);
        $imagen->save();
        $abousus->name= $request->name;
        $abousus->lastname= $request->lastname;
        $abousus->position =$request->position;
        $abousus->phone = $request->phone;
        $abousus->imagen_location = $path_imagen;
        $abousus->save();
        }else
        {
            $abousus->name= $request->name;
            $abousus->lastname= $request->lastname;
            $abousus->position =$request->position;
            $abousus->phone = $request->phone;
            $abousus->save();
        }
        return redirect()->route('articles.show',$abousus->modul->id) ->with('status_success','Operación con éxito'); 
    }
    public function destroy(AbousUs $abousus)
    {
        $anterior = $abousus;
        $abousus->delete();

        return redirect()->route('articles.show',$anterior->modul->id) ->with('status_success','Persona Eliminado !'); 
    }
}
