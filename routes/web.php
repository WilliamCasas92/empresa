<?php

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
    return view('welcome');
});

Auth::routes();

//Protegidos por middleware
Route::get('/home', 'HomeController@index')->name('home')->middleware('login');

Route::resource('clientes', 'ClientesController')->middleware('login');

Route::post('importar_csv',array('as'=>'archivo_csv','uses'=>'ArchivoController@importarArchivoBD'))->middleware('login');

Route::get('descarga_excel/{type}', array('as'=>'archivo_excel','uses'=>'ArchivoController@descargaExcel'))->middleware('login');

Route::get('vistapdf',array('as'=>'vistapdf','uses'=>'ArchivoController@descargaPDF'))->middleware('login');


Route::get('generar_email', array('as'=>'generar_email','uses'=>'EmailController@enviar_email'))->middleware('login');

Route::get('emailenviado', function () {
    return view('emailenviado')->middleware('login');
});