<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Place;
use App\Modelos\EventPlace;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;




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
        
        return view('eventos.eventosplace', compact('places'));
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
        $path_imagen = $request->file('imagen_location')->store('eventos', 'public');

        //Resize imagen
        $imagen = Image::make( public_path("storage/{$path_imagen}"))->resize(1700, 600);
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
    public function update(Request $request, $id)
    {
        $datos= request()->except(['_token','_method']);
        $nuevo = EventPlace::where('id',$id)->update($datos);

        return response()->json($nuevo);
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
     $eventos->delete();
     return response()->json($id);
    }
    public function mostrar()
    {   
        $places = Place::all();
        $eventos = EventPlace::all();
        return view('eventos.showeventsall',compact('places','eventos'));
    }
}
