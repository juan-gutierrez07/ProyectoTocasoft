<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Category;
use App\Modelos\TuoristRoute;
use App\Modelos\Modul;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use DB;
use Carbon\Carbon;
class RutaController extends Controller
{   

    public function index()
    {
        $modelos = TuoristRoute::all();
       
        $categoria=Category::with('routeturist')->where('type','Ruta')->get();
        
        
            // return $places;

        return view('rutas_turisticas.inforutas',compact('modelos','categoria'));
    }
    public function create()
    {
          // $naturales=[];
        // $culturales=[];
        // $gubernamentales=[];
        // $historicos=[];
        // $hoteles=[];
        $places = [];
        $categoria=Category::with('places')->where('type','Sitio')->get();
        $disponibles=Category::with('places')->where('type','Ruta')->get();
        // $categoriaruta = Category::where('type','Ruta')->get();
        foreach($categoria as $categorias)
        {
            array_push($places,  $categorias->places);
        }
            $places = json_encode($places);
            // return $places;
        return view('rutas_turisticas.create',compact('categoria', 'places','disponibles'));    
    }
    public function store(Request $request)
    {
            $request->validate([
                'name' => 'required|unique:tuorist_routes,name',
                'time_travel' => 'required',
                'imagen_principal'=> 'required|max:2000',
                'place' => 'required',
                'category_id' => 'required',
                'description'=>'required|min:20',
                'uuid' => 'required'
            ]);
            $slug = Modul::where('slug','Rutas')->get()->first();
        $path_imagen = $request->file('imagen_principal')->store('rutas_turisticas', 'public');
        $imagen = Image::make( public_path("storage/{$path_imagen}"))->fit(800, 450);
        $imagen->save();
            $nuevo= new TuoristRoute();
            $nuevo->name = $request->name;
            $nuevo->time_travel = $request->time_travel;
            $nuevo->imagen_principal = $path_imagen;
            $nuevo->category_id = $request->category_id;
            $nuevo->description = $request->description;
            $nuevo->uuid = $request->uuid;
            $nuevo->modul_id = 3;
            $nuevo->save();
            // $ruta = TuoristRoute::create($request->all());
            $nuevo->places()->sync($request->get('place'));
            return view('imagenes.rutas',compact('nuevo'))->with('status_success','Ruta Creada, Agrega las imagenes'); 
             
        
    }

    public function ruta($id)
    {
        $rutas = TuoristRoute::with('places'->all(['lat','lng']))->find($id);
        $coordenadas= array();
        return $rutas->places;
        foreach ($rutas[0]->places as $ruta)
        {

            $coordenadas=$ruta;
            
        }
        
        

        return response()->json($coordenadas);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('rutas_turisticas.rutasturisticas');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $ruta = TuoristRoute::find($id);
            $ruta->delete();
            $respuesta =[
                'status'=> 200,
                'body' => "Se elimino correctamente",
            ];
            return response()->json($respuesta);
    }
    }

