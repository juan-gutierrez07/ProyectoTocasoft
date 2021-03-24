<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Modelos\ImagesRoutes;
class ImagesRoutesController extends Controller
{
    public function store(Request $request){


        $path_image=$request->file('file')->store('rutas_turisticas','public');
        $imagen = Image::make( public_path("storage/{$path_image}"))->fit(600, 450);
        $imagen->save();
        $imagen_route = new ImagesRoutes();
        $imagen_route->locaction = $path_image;
        $imagen_route->id_route= $request['uuid'];
        $imagen_route->save();
        
        $respuesta = [
                'archivo' => $path_image,
        ];

        return response()->json($respuesta);
    }

    public function destroy(Request $request)
    {
           // Imagen a eliminar
           $imagen = $request->get('imagen');
   
          if(File::exists('storage/' . $imagen))
            {
              // Elimina imagen del servidor
              File::delete('storage/' . $imagen);
   
              // elimina imagen de la BD
              ImagesRoutes::where('location', $imagen )->delete();
            }
            $respuesta = [
                'mensaje' => 'Imagen Eliminada',
                
            ];
             return response()->json($respuesta);
    }
}
