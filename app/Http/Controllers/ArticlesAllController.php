<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\ArticlesAll;
use App\Modelos\Modul;
use App\Modelos\Category;
use App\Modelos\StatePublication;
use Intervention\Image\Facades\Image;

class ArticlesAllController extends Controller
{
    public function index(Modul $modul)
    {   
        $estados  = StatePublication::all();
        if($modul->slug == "sitios")
        {
        $disponibles = Category::whereNotIn("slug", ArticlesAll::pluck("slug")->all())->get();

        return view('modulos.listarcontenido',compact('modul','disponibles','estados'));
        }else if($modul->slug == "personal")
        {
            return "contenido personal";
        }else if($modul->slug =="eventos")
        {
            return "contenido para eventos";
        }else if($modul->slug == "rutas")
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
        $nuevo = new ArticlesAll();
        $nuevo->name = $request->name;
        $nuevo->description = $request->description;
        $nuevo->slug = $request->name;
        $nuevo->image_location = $request->imagen_principal;
        $nuevo->state_publication_id = $request->status;
        $nuevo->modul_id = $modul->id;
        $nuevo->save();
        return redirect()->route('articles.show',$modul->id)->with('status_success','Articulo Creado!'); ;


    }

    public function update(Request $request,ArticlesAll $articlesall)
    {   
        
        $request->validate([
            'name'=> 'required|not_in:0',
            'description' => 'required|min:20',
            'imagen_principal' => 'max:5000',
            
        ]);
            if($request->imagen_principal != null)
            {
            $path_imagen = $request->imagen_principal->store('articles','public');
            $imagen = Image::make( public_path("storage/{$path_imagen}"))->resize(1080,1350);
            $imagen->save();
            }else{
                $path_imagen= '';
            }
            
            $articlesall->name = $request->name;
            $articlesall->description = $request->description;
            $articlesall->image_location = $path_imagen;
            $articlesall->state_publication_id = $request->status;
            $articlesall->slug = $request->name;
            $articlesall->save();
            
            return redirect()->route('articles.show',$articlesall->modul->id) ->with('status_success','Operación con éxito'); ;
    }
}
