<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\ArticlesAll;
use App\Modelos\Modul;
use App\Modelos\Category;
use App\Modelos\StatePublication;
use App\Modelos\AbousUs;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use DB;


class ArticlesAllController extends Controller
{
    public function index(Modul $modul)
    {   
        $estados  = StatePublication::all();
        
        if($modul->slug == "Sitios")
        {
        $disponibles = Category::whereNotIn("slug", ArticlesAll::pluck("slug")->all())->get();
        
        return view('modulos.listarcontenido',compact('modul','disponibles','estados'));
        }else if($modul->slug == "Personal")
        {
            $personal = AbousUs::all();

            return view('modulos.listarcontenido',compact('modul','estados','personal'));
        }else if($modul->slug == "Rutas")
        {
            return "cotenido rutas";
        }
    }

    public function store(Request $request,Modul $modul)
    {
        $request->validate([
            'name'             =>'not_in:0',
            'description'      => 'required|min:20|',
            'imagen_principal' => 'max:5000',
            'status'           => 'required|not_in:0'
        ]);
             //leer imagen
             $path_imagen = $request->file('imagen_principal')->store('contenido', 'public');

             //Resize imagen
             $imagen = Image::make( public_path("storage/{$path_imagen}"))->fit(1000, 450);
             $imagen->save();
     
        $nuevo = new ArticlesAll();
        $nuevo->name = $request->name;
        $nuevo->description = $request->description;
        $nuevo->slug = $request->name;
        $nuevo->image_location = $request->imagen_principal;
        $nuevo->state_publication_id = $request->status;
        $nuevo->modul_id = $modul->id;
        $nuevo->save();
        DB::table('auditorias')->insert([
            'detail' => 'Creacion de contenido'. " ".$nuevo->name,
            'user' => auth()->user()->name . " " ."|" .auth()->user()->roles[0]->rolname,
            'created_at'=>Carbon::now(),
        ]);
        return redirect()->route('articles.show',$modul->id)->with('status_success','Articulo Creado!'); ;
        

    }

    public function update(Request $request,ArticlesAll $articlesall)
    {   
        
        $request->validate([
            'name'=> 'required|not_in:0',
            'description' => 'required|min:20',
            'imagen_principal' => 'max:5000',
            
        ]);
        $path_imagen = $request->file('imagen_principal')->store('articles', 'public');
            $imagen = Image::make( public_path("storage/{$path_imagen}"))->resize(1700, 600);
            $imagen->save();
        
            
            $nombre_anterior=  $articlesall->name;
            $articlesall->name = $request->name;
            $articlesall->description = $request->description;
            $articlesall->image_location = $path_imagen;
            $articlesall->state_publication_id = $request->status;
            $articlesall->slug = $request->name;
            $articlesall->save();
            DB::table('auditorias')->insert([
                'detail' => 'Actualizacion de contenido'. " de ".$nombre_anterior,
                'user' => auth()->user()->name . " " ."|" .auth()->user()->roles[0]->rolname,
                'created_at'=>Carbon::now(),
            ]);
            return redirect()->route('articles.show',$articlesall->modul->id) ->with('status_success','Operación con éxito'); ;
    }
}
