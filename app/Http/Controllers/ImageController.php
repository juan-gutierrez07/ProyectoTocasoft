<?php

namespace App\Http\Controllers;
use App\Modelos\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Modelos\Category;
use App\Modelos\Place;
use DB;
use Carbon\Carbon;

class ImageController extends Controller
{
 
    public function show()
    {
        $categorias = Category::where('type','=','Sitio')->get();
        
        return view('imagenes.sitios',compact('categorias'));
    }

    public function send( Category $category)
    {
        $sitios=Place::where('category_id',$category->id)->get();

        return response()->json($sitios);
    }
    public function store( Request $request)
    {
        //leer imagen
        $path_imagen = $request->file('file')->store('establecimientos', 'public');

        //Resize imagen
        $imagen = Image::make( public_path("storage/{$path_imagen}"))->fit(800, 450);
        $imagen->save();

        //Guardando imagen
        $imagedb  = new Images;
        $imagedb->location= $path_imagen;
        $imagedb->id_establecimiento = $request['uuid'];
        $imagedb->save();
        
        
        $respuesta = [
            'archivo' => $path_imagen
        ];
        $nombre_sitio= Place::where("uuid",$imagedb->id_establecimiento)->first();
        DB::table('auditorias')->insert([
            'detail' => 'Se agrego nueva imagen'. " ".$nombre_sitio->name,
            'user' => auth()->user()->name . " " ."|" .auth()->user()->roles[0]->rolname,
            'created_at'=>Carbon::now(),
        ]);
        return response()->json($respuesta);
    }



    public function destroy( Request $request)
    {
              // Imagen a eliminar
           $imagen = $request->get('imagen');
   
          if(File::exists('storage/' . $imagen))
            {
              // Elimina imagen del servidor
              File::delete('storage/' . $imagen);
   
              // elimina imagen de la BD
              Images::where('location', $imagen )->delete();
            }
            $respuesta = [
                'mensaje' => 'Imagen Eliminada',
                'imagen' => $imagen
            ];
             return response()->json($respuesta);
    }

    public function sitio(Images $images)
    {
        if(File::exists('storage/'. $images->location))
        {
            File::delete('storage/' . $images->location);

            Images::where('id','=',$images->id)->delete();
        }
        $respuesta = [
            'message'=> 'Se elimino correctamente',
        ];
         
        return response()->json($respuesta);
    }
}