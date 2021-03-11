<?php

use Illuminate\Support\Facades\Route;
use App\User;
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

Route::get('/', function () {
    return view('principal/template');
});
Route::get('/noautorizado',function(){

    return view('errores/401');
});
Route::get('/home', 'HomeController@index')->name('home');

//     return view('establecimientos.create');
// });
Auth::routes();
Auth::routes(['verify' => true]);

//Todas las rutas del group debe ser autenticadas o verificadas en tal caso..
Route::group(['middleware' => ['admin','auth']], function(){
    Route::get('/establecimiento/create','PlaceController@create')->name('place.create');
    Route::post('/establecimiento/store','PlaceController@store')->name('place.store');
    Route::get('/establecimiento/edit/{place}','PlaceController@edit')->name('place.edit');
    Route::get('/establecimiento/destroy/{place}','PlaceController@destroy')->name('place.destroy');
    Route::get('/establecimiento/info','PlaceController@info')->name('place.list');
    Route::post('/imagenes/store','ImageController@store')->name('imagenes.store');
    Route::post('/imagenes/destroy','ImageController@destroy')->name('imagenes.destroy');
    Route::get('/establecimientos','PlaceController@all')->name('places');
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

