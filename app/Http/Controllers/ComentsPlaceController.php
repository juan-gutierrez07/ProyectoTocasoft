<?php

namespace App\Http\Controllers;
use App\Modelos\Place;
use App\Modelos\CommentsPlace;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
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
        DB::table('auditorias')->insert([
            'detail' => 'Creacion de comentario'. " en sitio ". $comentario->place_id,
            'user' => auth()->user()->name . " " ."|" .auth()->user()->roles[0]->rolname,
            'created_at'=>Carbon::now(),
        ]);
        return redirect()->route('place.show',$request->place_id)
        ->with('status_success','Comentario Agregado !!'); 
    }

    public function destroy(CommentsPlace $commentsplace)
    {
        $id_comentario=$commentsplace->place_id;
        $commentsplace->delete();
            $total = CommentsPlace::where('place_id','=',$commentsplace->place->id)->count();
            $puntos = CommentsPlace::where('place_id','=',$commentsplace->place->id)->sum('points');
            if($total >0){
                $promedio = number_format($puntos/$total,1);
            }else{
                $promedio = 0;
            }
            
        $respuesta = [
            'status'=>'200',
            'body'=>'Eliminado correctamente',
            'total'=> $total,
            'promedio'=> $promedio
        ];
        DB::table('auditorias')->insert([
            'detail' => 'Eliminacion de comentario del sitio'. " ". $id_comentario,
            'user' => auth()->user()->name . " " ."|" .auth()->user()->roles[0]->rolname,
            'created_at'=>Carbon::now(),
        ]);
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

        DB::table('auditorias')->insert([
            'detail' => 'Actualizacion de comentario del sitio'. " ". $commentsplace->place_id,
            'user' => auth()->user()->name . " " ."|" .auth()->user()->roles[0]->rolname,
            'created_at'=>Carbon::now(),
        ]);
        return redirect()->route('place.show',$request->place_id)
        ->with('status_success','Comentario Editado !!'); ;   
    }
}
