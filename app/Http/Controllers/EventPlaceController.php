<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Place;
use App\Modelos\EventPlace;
class EventPlaceController extends Controller
{
    public function show()
    {   
        $places = Place::all();
        return view('eventos.eventosplace', compact('places'));
    }
    public function send()
    {
        $data['eventos']= EventPlace::all();

        return response()->json($data['eventos']);
    }

    public function store( Request $request)
    {
        $datos= request()->except(['_token','_method']);
        $nuevo = new EventPlace();
        $nuevo->title = $datos['name'];
        $nuevo->descripcion = $datos['descripcion'];
        $nuevo->place_id = $datos['place_id'];
        $nuevo->start = $datos['start'];
        $nuevo->end = $datos['finish'];
        $nuevo->color = $datos['color'];
        $nuevo->save();

        print_r($datos);

    }
    public function update(Request $request, EventPlace $eventplace)
    {

    }
    public function destroy(EventPlace $eventplace)
    {

    }
}
