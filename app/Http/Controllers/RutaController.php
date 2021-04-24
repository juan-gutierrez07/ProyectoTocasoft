<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Category;
use App\Modelos\TuoristRoute;
use App\Modelos\Modul;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use DB;
use App\Modelos\ImagesRoutes;
use Carbon\Carbon;
class RutaController extends Controller
{   

    public function index()
    {
        $modelos = TuoristRoute::with("places")->get();
       
        $categoria=Category::all();
        
        
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
        $categoria=Category::with('places')->get();
        // $categoriaruta = Category::where('type','Ruta')->get();
        foreach($categoria as $categorias)
        {
            array_push($places,  $categorias->places);
        }
            $places = json_encode($places);
            // return $places;
        return view('rutas_turisticas.create',compact('categoria', 'places'));    
    }
    public function store(Request $request)
    {
            $request->validate([
                'name' => 'required|unique:tuorist_routes,name',
                'time_travel' => 'required',
                'imagen_principal'=> 'required|max:2000',
                'place' => 'required',
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
            $nuevo->description = $request->description;
            $nuevo->uuid = $request->uuid;
            $nuevo->modul_id = 3;
            $nuevo->save();
            // $ruta = TuoristRoute::create($request->all());
            $nuevo->places()->sync($request->get('place'));
            DB::table('auditorias')->insert([
                'detail' => 'Creacion de la ruta  '. " ". $nuevo->name,
                'user' => auth()->user()->name . " " ."|" .auth()->user()->roles[0]->rolname,
                'created_at'=>Carbon::now(),
            ]);
            return view('imagenes.rutas',compact('nuevo'))->with('status_success','Ruta Creada, Agrega las imagenes'); 
             
        
    }

    public function ruta($id)
    {
        $establecimientos = TuoristRoute::with("places")->where('id',$id)->get();
        return response()->json($establecimientos);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {   
        $rutas = TuoristRoute::with('places')->get();
        
        return view('rutas_turisticas.showrutasall', compact('rutas'));
    }

   public function view(TuoristRoute $tuoristroute)
   {
    
    return view('rutas_turisticas.showindividualruta',compact('tuoristroute'));
   }
    public function edit( TuoristRoute $tuoristroute)
    {
        $ruta = TuoristRoute::with('places')->where('id',$tuoristroute->id)->get()->first();
        // $disponibles = Category::whereNotIn("slug", ArticlesAll::pluck("slug")->all())->get();
        // return response()->json($ruta->places->pluck("category_id"));

        //  $categoria = Category::whereIn('id',$ruta->places->pluck("category_id"))->get();
        foreach($tuoristroute->places as $place) {
            $places_id[]=$place->id; 
        }
            $categoria = Category::all();
            $imagenes = ImagesRoutes::where('id_route','=',$tuoristroute->uuid)->get();
         return view('rutas_turisticas.edit', compact('ruta','categoria','places_id','imagenes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TuoristRoute $tuoristroute)
    {       
        $request->validate([
            'name' => 'required|unique:tuorist_routes,name',
            'time_travel' => 'required',
            'imagen_principal'=> 'max:2000',
            'place' => 'required',
            'description'=>'required|min:20',
            'uuid' => 'required'
        ]);
        if($request->imagen_principal != null)
        {
            $path_imagen = $request->file('imagen_principal')->store('rutas_turisticas', 'public');
            $imagen = Image::make( public_path("storage/{$path_imagen}"))->fit(800, 450);
            $tuoristroute->imagen_principal = $path_imagen;
            $imagen->save();    
        }
            $anterior = $tuoristroute->name;
            $tuoristroute->name = $request->name;
            $tuoristroute->time_travel = $request->time_travel;
            $tuoristroute->description = $request->description;
            $tuoristroute->uuid = $request->uuid;
            $tuoristroute->save();
            $nuevo =$tuoristroute;
            // $ruta = TuoristRoute::create($request->all());
            $tuoristroute->places()->sync($request->get('place'));
            DB::table('auditorias')->insert([
                'detail' => 'Se edito la ruta turistica '. " " .$anterior ." ". $nuevo->name,
                'user' => auth()->user()->name . " " ."|" .auth()->user()->roles[0]->rolname,
                'created_at'=>Carbon::now(),
            ]);
            return view('imagenes.rutas',compact('nuevo'))->with('status_success','Ruta Editada !, Agrega las imagenes'); 
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
            $nombre=$ruta->name;
            $ruta->delete();
            $respuesta =[
                'status'=> 200,
                'body' => "Se elimino correctamente",
            ];
            DB::table('auditorias')->insert([
                'detail' => 'Eliminacion de la ruta  '. " ". $nombre,
                'user' => auth()->user()->name . " " ."|" .auth()->user()->roles[0]->rolname,
                'created_at'=>Carbon::now(),
            ]);
            return response()->json($respuesta);
    }
    }

