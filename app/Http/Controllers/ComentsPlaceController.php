<?php

namespace App\Http\Controllers;
use App\Modelos\Place;
use App\Modelos\CommentsPlace;
use Illuminate\Http\Request;
use DB;
class ComentsPlaceController extends Controller
{
    public function all(Place $place)
    {
        $comentarios = CommentsPlace::where('place_id','=',$place->id)->get();
        $total = CommentsPlace::where('place_id','=',$place->id)->count();
        $puntos = CommentsPlace::where('place_id','=',$place->id)->sum('points');
        return view('comentarios.showcomentarios',compact('comentarios','total','puntos','place'));
    }
    public function store(Request $request)
    {
        
        $request->validate([
            'descripcion'=>'required|min:50',
            'points'=>'required'
        ]);
        
        $comentario = new CommentsPlace();
        $comentario->place_id= $request->place_id;
        $comentario->user_id = auth()->user()->id;
        $comentario->content = $request->descripcion;
        $comentario->points = $request->points;
        $comentario->save();

        return redirect()->route('place.show',$request->place_id)
        ->with('status_success','Comentario Agregado !!'); 
    }

    public function destroy(CommentsPlace $commentsplace)
    {
        $commentsplace->delete();
            $total = CommentsPlace::where('place_id','=',$commentsplace->place->id)->count();
            $puntos = CommentsPlace::where('place_id','=',$commentsplace->place->id)->sum('points');
            $promedio = number_format($puntos/$total,1);
        $respuesta = [
            'status'=>'200',
            'body'=>'Eliminado correctamente',
            'total'=> $total,
            'promedio'=> $promedio
        ];

        return response()->json($respuesta);
        
    }

    public function update(Request $request, CommentsPlace $commentsplace)
    {
        $request->validate([
            'content'=>'required|min:50',
            'points'=>'required'
        ]);

        $nuevo = CommentsPlace::find($commentsplace->id);
        $nuevo->update($request->all());

         
        return redirect()->route('place.show',$request->place_id)
        ->with('status_success','Comentario Editado !!'); ;   
    }
}
