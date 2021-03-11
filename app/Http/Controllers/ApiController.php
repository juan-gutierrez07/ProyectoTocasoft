<?php

namespace App\Http\Controllers;
use App\Modelos\Place;
use App\Modelos\Category;
use Illuminate\Http\Request;
use App\Modelos\Images;

class ApiController extends Controller
{   
    //Me trae todas las categorias 
    public function categorias()
    {
        $categorias=Category::all();
        return response()->json($categorias);
    }
    //me trae una categoria filtrada usando bilding model
    public function categoria(Category $categoria)
    {
        $establecimientos = Place::where('category_id',$categoria->id)->with('category')->get();
        return response()->json($establecimientos);
    }
    //me busca un establecimiento filtrado usando bilding model con sus imagenes
    public function place(Place $place){    
        $imagenes = Images::where('id_establecimiento',$place->uuid)->get();
        $establecimiento = Place::findOrFail($place->id);
        $establecimiento->imagenes = $imagenes;
        return response()->json($establecimiento);
    }
    // //me elimina un establecimiento
    // public function destroy(Place $place){
    //     $place->delete();
    //     $respuesta =[
    //         'status'=> 200,
    //         'body' => "Se elimino correctamente",
    //     ];
    //     return response()->json($respuesta);
    // }
        //me muestra todos los establecimientos 
    public function places(){
        $establecimientos = Place::with('category')->get();
        return response()->json($establecimientos);
    }
}
