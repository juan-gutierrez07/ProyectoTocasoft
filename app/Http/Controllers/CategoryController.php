<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Category;
use App\Modelos\Place;
class CategoryController extends Controller
{
    public function categoria(Category $category)
    {
        $establecimientos = Place::where('category_id',$category->id)->with('category')->get();
      return view('categorias.establecimientocategoria');
    }
}

