<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Place;
use App\Modelos\EventPlace;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use DB;
use App\Modelos\Modul;
use Carbon\Carbon;



class EventPlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = Place::all();
        $sitios = Modul::where('slug','Sitios')->get()->first();
        
        return view('eventos.eventosplace', compact('places','sitios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request)
    {   
        $request->validate([
            'name' => 'required',
            'description' => 'required|min:20',
             'place_id' => 'required',
            'imagen_location' => 'required|image|max:1000',
        
            
        ]);
        
        $path_imagen = $request->file('imagen_location')->store('eventos', 'public');

        //Resize imagen
        $imagen = Image::make( public_path("storage/{$path_imagen}"))->resize(800, 600);
        $imagen->save();
        $datos= request()->except(['_token','_method']);
        $nuevo = new EventPlace();
        $nuevo->title = $datos['name'];
        $nuevo->descripcion = $datos['description'];
        $nuevo->imagen_location = $path_imagen;
        $nuevo->place_id = $datos['place_id'];
        $nuevo->start = $datos['start'];
        $nuevo->end = $datos['end'];;
        $nuevo->color = $datos['color'];
        $nuevo->save();
        DB::table('auditorias')->insert([
            'detail' => 'Creacion de evento'. " ". $nuevo->title,
            'user' => auth()->user()->name . " " ."|" .auth()->user()->roles[0]->rolname,
            'created_at'=>Carbon::now(),
        ]);
        return response()->json($request);

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data['eventos']= EventPlace::all();
        return response()->json($data['eventos']);
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
    public function update(Request $request,EventPlace $eventplace)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required|min:20',
            'horainicio' => 'required',
            'horafin' => 'required|after:horainicio',
            'place_id'=> 'required',
            'imagen_location' => 'image|max:2000'
        ]);
            
        $anterior = $eventplace;
        if($request->imagen_location != null){
            $path_imagen = $request['imagen_location']->store('eventos', 'public');
            $imagen = Image::make( public_path("storage/{$path_imagen}"))->resize(800, 600);
            $imagen->save();    
            $eventplace->imagen_location = $path_imagen;
        }    
        
        $horainicial= date('Y-m-d',strtotime(now())) . " ". date( 'H:i:s',strtotime($request['horainicio'])); 
        $horafinal= date('Y-m-d',strtotime(now())) . " ". date( 'H:i:s',strtotime($request['horafin'])); 
        $eventplace->title = $request['title'];
        $eventplace->descripcion = $request['description'];
        $eventplace->start = $horainicial;
        $eventplace->end = $horafinal;
        $eventplace->place_id = $request['place_id'];
        if($request->get('color'))
        {
         $eventplace->color = $request['color'];
        }
        $eventplace->save();
        DB::table('auditorias')->insert([
            'detail' => 'Actualizacion en el evento'. " ". $anterior->title . " " ." A ".  $eventplace->title,
            'user' => auth()->user()->name . " " ."|" .auth()->user()->roles[0]->rolname,
            'created_at'=>Carbon::now(),
        ]);
        $sitios = Place::all();
        $eventos = EventPlace::with('place')->get();
        return redirect()->route('eventos.mostrar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $eventos = EventPlace::findOrFail($id);
     DB::table('auditorias')->insert([
        'detail' => 'Eliminacion de evento'. " ". $eventos->title,
        'user' => auth()->user()->name . " " ."|" .auth()->user()->roles[0]->rolname,
        'created_at'=>Carbon::now(),
    ]);
     $eventos->delete();
     return response()->json($id);
    }
    public function mostrar()
    {   
        $sitios = Place::all();
        $eventos = EventPlace::with('place')->get();
        return view('eventos.showeventsall',compact('eventos','sitios'));
    }

    
}
