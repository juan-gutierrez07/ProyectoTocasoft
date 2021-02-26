<?php

namespace App\Http\Controllers;
use App\Modelos\Place;
use App\Modelos\Category;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function categorias()
    {
        $categorias=Category::all();
        return response()->json($categorias);
    }

    public function categoria(Category $categoria)
    {
        $establecimientos = Place::where('category_id',$categoria->id)->with('category')->get();
        return response()->json($establecimientos);
    }
}
