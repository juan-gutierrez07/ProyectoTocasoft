<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Category;
use App\Modelos\Place;
use App\Modelos\Images;
class CategoryController extends Controller
{
    public function categoria(Category $category)
    {
        $establecimientos = Place::where('category_id',$category->id)->with('category')->get();
      return view('establecimientos.establecimientosall',compact('establecimientos'));
    }
}

