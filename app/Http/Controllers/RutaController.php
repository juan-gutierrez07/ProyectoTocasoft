<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Category;
use App\Modelos\TuoristRoute;

class RutaController extends Controller
{
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
                'place' => 'required',
                'category_id' => 'required',
                'description'=>'required|min:20',
                'uuid' => 'required'
            ]);

            $ruta = TuoristRoute::create($request->all());
            
            $ruta->places()->sync($request->get('place'));
            return response()->json($ruta);
    }

    public function ruta($id)
    {
        $ruta = TuoristRoute::find($id);
        
        return response()->json($ruta->places);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
