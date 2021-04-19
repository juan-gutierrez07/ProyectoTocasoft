<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Place;
use App\Modelos\Category;
use App\Modelos\Images;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\Facades\Image;

class PlaceController extends Controller
{
   
  
    public function create()
    {
        $places=Category::all();
            
      return view('establecimientos.create',compact('places'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('haveaccess','user.show'); 
         $request->validate([
            'name' => 'required|unique:places,name',
            'categoria_id' => 'required',
            'imagen_principal' => 'required|image|max:1000',
            'direccion' => 'required|unique:places,direccion',
            'lat' => 'required',
            'lng' => 'required',
            'telefono' => 'required|numeric',
            'descripcion' => 'required|min:20',
            'apertura' => 'date_format:H:i',
            'cierre' => 'date_format:H:i|after:apertura',
            'uuid' => 'required|uuid'
        ]);
                
        //Guardando imagen en el store desde el cliente
        $path_imagen = $request['imagen_principal']->store('principal_establecimientos', 'public');
        $imagen = Image::make( public_path("storage/{$path_imagen}"))->resize(1700, 600);
        $imagen->save();
        //Guardando con el modelo
        $nuevo = new Place;
        
        $nuevo->name = $request->name;
        $nuevo->imagen_principal= $path_imagen;
        $nuevo->category_id= $request->categoria_id;
        $nuevo->direccion = $request->direccion;
        $nuevo->lat= $request->lat;
        $nuevo->lng=$request->lng;
        $nuevo->telefono = $request->telefono;
        $nuevo->descripcion= $request->descripcion;
        $nuevo->apertura= $request->apertura;
        $nuevo->cierre=$request->cierre;
        $nuevo->uuid=$request['uuid'];
        $nuevo->save();
        
        return view('imagenes.sitios',compact('nuevo'))->with('status_success','Sitio creado !');
    }

    public function info()
    {
        $modelos = Place::all();
        $places = [];
        $categoria=Category::with('places')->get();
        // $categoriaruta = Category::where('type','Ruta')->get();
        foreach($categoria as $categorias)
        {
            array_push($places,  $categorias->places);
        }
            $places = json_encode($places);
            // return $places;

        return view('establecimientos/informacion',compact('modelos','categoria', 'places'));
    }
    public function show(Place $place)
    {
        $place= Place::where('id','=',$place->id)->get();
        return view('establecimientos.showestablecimiento',compact('place'));
    }

    public function mapshow()
    {
        return view('establecimientos.mapaall');
    }
    public function edit(Place $place)
    {
        $place->apertura = date('H:i', strtotime($place->apertura) );
        $place->cierre = date('H:i', strtotime($place->cierre));
        $categorys = Category::where('id','!=',$place->id)->orWhereNull('id')->get();
        $imagenes = Images::where('id_establecimiento','=',$place->uuid)->get();
        return view('establecimientos.editar', compact('place','categorys','imagenes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Place $place)
    {
        $data=$request->validate([
            'name' => 'required|unique:places,name',
            'categoria_id' => 'required',
            'imagen_principal' => 'image|max:1000',
            'direccion' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'telefono' => 'required|numeric',
            'descripcion' => 'required|min:20',
            'apertura' => 'date_format:H:i',
            'cierre' => 'date_format:H:i|after:apertura',
            'uuid' => 'required|uuid'
        ]);
        $place->name = $data['name'];
        $place->category_id = $data['categoria_id'];
        $place->direccion = $data['direccion'];
        $place->lat = $data['lat'];
        $place->lng = $data['lng'];
        $place->telefono = $data['telefono'];
        $place->descripcion = $data['descripcion'];
        $place->apertura = $data['apertura'];
        $place->cierre = $data['cierre'];
        $place->uuid = $data['uuid'];
           
        

        if(request('imagen_principal')) {
            // Guardar la imagen
            $ruta_imagen = $request['imagen_principal']->store('principal_establecimientos', 'public');

            // Resize a la imagen
            $img = Image::make( public_path("storage/{$ruta_imagen}") )->fit(800, 600);
            $img->save();

            $place->imagen_principal = $ruta_imagen;
        }
            $nuevo= $place;
            $place->save();
            
            return view('imagenes.sitios',compact('nuevo'))->with('status_success','Sitio Creado, Agrega las imagenes'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place){
        $place->delete();
        $respuesta =[
            'status'=> 200,
            'body' => "Se elimino correctamente",
        ];
        return response()->json($respuesta);
    }
}
