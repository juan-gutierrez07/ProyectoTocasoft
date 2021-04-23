<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\Modelos\Modul;
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
//Modulos
Route::get('/', 'ModulController@all')->name('home');

Route::post('/modulos/update/{modul}','ModulController@update')->name('modul.update');

//Comentarios
Route::post('/comentcreate','ComentsPlaceController@store')->name('comentplace.store');
Route::get('/coment/destroy/{commentsplace}','ComentsPlaceController@destroy');
Route::post('/coment/update/{commentsplace}','ComentsPlaceController@update')->name('coment.update');
//Eventos
Route::resource('/eventos','EventPlaceController');
Route::post('/eventos/update/{eventplace}','EventPlaceController@update')->name('eventos.update');
Route::get('/sitios','PlaceController@mapshow')->name('mapa.places');
Route::get('/events/mostrar', 'EventPlaceController@mostrar')->name('eventos.mostrar');
Route::get('/noautorizado',function(){
    return view('errores/401');
});
Route::get('/backup','HomeController@down')->name('descargar');
Auth::routes();
Auth::routes(['verify' => true]);

//Todas las rutas del group debe ser autenticadas o verificadas en tal caso..
Route::group(['middleware' => ['admin']], function(){
    Route::get('/establecimiento/create','PlaceController@create')->name('place.create');
    Route::post('/establecimiento/store','PlaceController@store')->name('place.store');
    Route::get('/establecimiento/edit/{place}','PlaceController@edit')->name('place.edit');
    Route::post('/establecimiento/update/{place}','PlaceController@update')->name('place.update');
    Route::get('/establecimiento/destroy/{place}','PlaceController@destroy')->name('place.destroy');
    Route::get('/establecimiento/info','PlaceController@info')->name('place.list');
    Route::post('/categoria/store','CategoryController@store')->name('category.store');
    Route::post('/categoria/update/{id}','CategoryController@update')->name('category.update');
    //Rutas para administrar imagenes
    Route::post('/imagenes/store','ImageController@store');
    Route::post('/imagenes/destroy','ImageController@destroy');
    Route::get('/imagensitio/destroy/{images}','ImageController@sitio')->name('imagensitio');
    Route::post('/imagenesrt','ImagesRoutesController@store');
    Route::post('/imagenesrt/destroy','ImagesRoutesController@destroy');
    //Rutas turisticas
    Route::get('/rutas/create','RutaController@create')->name('rutas');
    Route::post('/rutas/store','RutaController@store')->name('rutas.store');
    Route::get('/rutas','RutaController@index')->name('rutas.index');

    Route::get('/rutas/coordenas/{id}','RutaController@ruta')->name('coordenas');
    Route::get('/rutas/destroy/{id}','RutaController@destroy');
    Route::get('/rutas/all','RutaController@show')->name('ruta.all');
    Route::get('/ruta/{tuoristroute}','RutaController@view')->name('ruta.view');
    
}); 

//Crear contenido del sistema
Route::group(['middleware' => ['admin']], function(){
 Route::get('/imagenes','ImageController@show')->name('images.sitio');
 Route::post('/categoria/sitios/{category}','ImageController@send');
 Route::get('/imagesroute','ImagesRoutesController@show')->name('images.route');
 Route::get('/modulos','ModulController@show')->name('modul.show');
 //Contenido
Route::get('/contenido/{modul}','ArticlesAllController@index')->name('articles.show');
Route::post('/create/article/{modul}','ArticlesAllController@store')->name('articles.store');
Route::post('/articles/update/{articlesall}','ArticlesAllController@update')->name('article.update');
Route::post('/create/personal/{modul}','AbousUsController@store')->name('aboutus.store');
Route::post('/personal/update/{abousus}','AbousUsController@update')->name('aboutus.update');
Route::get('/personal/destroy/{abousus}','AbousUsController@destroy')->name('aboutus.destroy');
Route::get('/auditoria','AuditoriaController@show')->name('auditoria');
});

//Rutas de usuarios->roles y sus respectivos permisos
    Route::resource('/role', 'RoleController')->names('role')->middleware('auth');    
    Route::resource('/users', 'UserController',['exept'=>'create','store'])->names('user')->middleware('auth');


//Pruebas

Route::get('/test', function(){
   $slug = Modul::where('slug','Rutas')->first();
    return $slug->slug;
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

