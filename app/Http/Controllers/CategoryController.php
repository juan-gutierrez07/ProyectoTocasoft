<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Category;
use App\Modelos\Place;
use App\Modelos\Images;
use App\Modelos\ArticlesAll;
use DB;
use Carbon\Carbon;
class CategoryController extends Controller
{
    public function categoria(Category $category)
    {
        $establecimientos = Place::where('category_id',$category->id)->with('category')->get();
      return view('establecimientos.establecimientosall',compact('establecimientos'));
    }
    public function store(Request $request)
    {
        $request->validate([
          'name' => 'required|unique:categories,name'
        ]);
        $nuevo = new Category();
        $nuevo->name = $request->name;
        $nuevo->slug = $request->name;
        $nuevo->save();
        return redirect()->route('place.list')->with('status_success','Categoria creada !');;
    }

    public function update(Request $request, $id)
    {
      $request->validate([
        'name' => 'required'
        ]);

        $category = Category::find($id);
        $article = ArticlesAll::where("slug","=",$category->slug)->get()->first();
        if($article != null )
        {
          $category->name = $request->name;
          $category->slug = $request->name;
          $article->slug = $request->name;
          $article->name = $request->name;
          $category->save();
          $article->save();  
          return redirect()->route('place.list')->with('status_success','Categoria editada !');;
        }else{
          $category->name = $request->name;
          $category->slug = $request->name;
          $category->save();
          return redirect()->route('place.list')->with('status_success','Categoria editada !');;
        }

        

    }
}

