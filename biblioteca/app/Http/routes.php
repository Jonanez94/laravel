<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

//Login
Route::resource('log','LogController');
Route::get('logout','LogController@logout');

//Inicio
Route::get('inicio', 'LectorController@index');
//Lector
Route::resource('lector','LectorController');
Route::get('listalectores','LectorController@ListaLectores');
//Autor
Route::resource('autor','AutorController');
Route::get('listaautores','AutorController@ListaAutores');
//Categoría
Route::resource('categoria','CategoriaController');
Route::get('listacategorias','CategoriaController@ListaCategorias');
//Editorial
Route::resource('editorial','EditorialController');
Route::get('listaeditoriales','EditorialController@ListaEditoriales');
//Libro
Route::resource('libro','LibroController');
Route::get('listalibros','LibroController@ListaLibros');
Route::get('datoslibro/{id}','LibroController@DatosLibro');
//Alquiler
Route::resource('prestamo','AlquilerController');
Route::get('listatitulos','AlquilerController@ListaTitulos');
Route::get('listaprestamos','AlquilerController@ListaPrestamos');