<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\Modelos\Place;
use Illuminate\Support\Facades\Gate;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/sitio/{place}','PlaceController@show')->name('place.show');
Route::get('/comentarios/sitios/{place}','ComentsPlaceController@all')->name('coment.place');
Route::get('/categoria/{category}','CategoryController@categoria')->name('category.place');
Route::get('/', 'ModulController@all')->name('home');
Route::post('/createarticle','ArticlesAllController@store')->name('articles.store');
Route::post('/comentcreate','ComentsPlaceController@store')->name('comentplace.store');
Route::get('/noautorizado',function(){

    return view('errores/401');
});

Auth::routes();
Auth::routes(['verify' => true]);

//Todas las rutas del group debe ser autenticadas o verificadas en tal caso..
Route::group(['middleware' => ['admin']], function(){
    Route::get('/establecimiento/create','PlaceController@create')->name('place.create');
    Route::post('/establecimiento/store','PlaceController@store')->name('place.store');
    Route::get('/establecimiento/edit/{place}','PlaceController@edit')->name('place.edit');
    Route::get('/establecimiento/destroy/{place}','PlaceController@destroy')->name('place.destroy');
    Route::get('/establecimiento/info','PlaceController@info')->name('place.list');
    //Rutas para administrar imagenes
    Route::post('/imagenes/store','ImageController@store');
    Route::post('/imagenes/destroy','ImageController@destroy');
    Route::get('/imagensitio/destroy/{images}','ImageController@sitio')->name('imagensitio');
    Route::post('/imagenesrt','ImagesRoutesController@store');
    Route::post('/imagenesrt/destroy','ImagesRoutesController@destroy');
    //Rutas turisticas
    Route::get('/rutas/create','RutaController@create')->name('rutas');
    Route::post('/rutas/store','RutaController@store')->name('rutas.store');
  
}); 

//Crear contenido del sistema
Route::group(['middleware' => ['admin']], function(){
 Route::get('/modulsitios','ModulController@sitios')->name('sitioshome');
 Route::get('/imagenes','ImageController@show')->name('images.sitio');
 Route::get('/imagesroute','ImagesRoutesController@show')->name('images.route');
 Route::get('/modulos','ModulController@show')->name('modul.show');


});

//Rutas de usuarios->roles y sus respectivos permisos
    Route::resource('/role', 'RoleController')->names('role')->middleware('auth');    
    Route::resource('/users', 'UserController',['exept'=>'create','store'])->names('user')->middleware('auth');


//Pruebas

Route::get('/test', function(){
    return Auth::user()->roles[0]->rolname;

    // return $user->RolAdmin($data);

//  return $user->havePermisson('user.show');
});

// Route::resource('/users', 'UserController',['exept'=>'create','store'])->names('user')->middleware('auth');
// Route::get('/test', function(){
//     $user= User::all();
//     $rol_names=[];
//     foreach($user->roles as $rol){
//             $rol_names[]= $rol['rolname'];
//     }
//     return $rol_names;
// });

