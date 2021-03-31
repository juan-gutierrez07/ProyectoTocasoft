<?php

namespace App\Http\Controllers;
use App\Modelos\Place;
use App\Modelos\CommentsPlace;
use Illuminate\Http\Request;

class ComentsPlaceController extends Controller
{
    public function all(Place $place)
    {
        $comentarios = CommentsPlace::where('place_id','=',$place->id)->get();
        return view('comentarios.showcomentarios',compact('comentarios'));
    }
}
