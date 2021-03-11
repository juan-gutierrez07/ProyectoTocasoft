<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Place;
use App\Modelos\Category;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\Facades\Image;

class PlaceController extends Controller
{
   
    public function all()
    {   $nombres=[];
        $places = [];
        $categoria=Category::with('places')->get();
        foreach($categoria as $categorias)
        {
            array_push($places,  $categorias->places);
        }
            $places = json_encode($places);
            // return $places;
        return view('rutas_turisticas.create',compact('categoria', 'places','nombres'));
    }
   
    public function create()
    {
        $places=Category::all()->where('type','Sitio');
            
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
        $imagen = Image::make( public_path("storage/{$path_imagen}"))->fit(400, 450);
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
        
        return redirect('/')->with('status_success','Establecimiento Registrado');
    }

    public function info()
    {
        $modelos = Place::all();

        return view('establecimientos/informacion',compact('modelos'));
    }
    public function show(Place $place)
    {
        //
    }

 
    public function edit(Place $place)
    {
        $establecimiento = Place::findOrFail($place->id);
        $categorys = Category::all();
        return view('establecimientos/editar', compact('establecimiento','categorys'));
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
        //
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
