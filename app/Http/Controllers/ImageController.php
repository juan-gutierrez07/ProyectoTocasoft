<?php

namespace App\Http\Controllers;
use App\Modelos\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;



class ImageController extends Controller
{
 

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
}