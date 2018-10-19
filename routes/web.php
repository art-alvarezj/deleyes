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
        return view('home');
    })->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
Auth::routes();

Route::get('/consultaCuenta', 'cuentaController@index')->name('consultaCuenta');



// Display view
Route::get('datatable', 'empleadoController@datatable');
Route::get('cliente', 'clienteController@index');
Route::get('servicios', 'servicioController@index');
// Get Data
Route::get('datatable/getdata', 'empleadoController@getPosts')->name('datatable/getdata');
Route::get('cliente/getdata', 'clienteController@getPosts')->name('cliente/getdata');
Route::get('servicios/getdata', 'servicioController@getPosts')->name('servicios/getdata');

// Route::get('liquidar', 'empleadoController@nominaLiquidar')->name('liquidar');
Route::match(['get', 'post'], 'liquidar/{id}', 'empleadoController@nominaLiquidar')->name('liquidar');

Auth::routes();

// Route::get('/retirosCuenta', 'cuentaController@edit')->name('retirosCuenta');


Route::match(['get', 'post'], 'retirosCuenta/', 'cuentaController@edit')->name('retirosCuenta');
Route::match(['get', 'post'], 'consignarCuenta/', 'cuentaController@store')->name('consignarCuenta');


Route::match(['get', 'post'], 'creacionempresa/', 'servicioController@creacionempresa')->name('creacionempresa');
Route::match(['get', 'post'], 'datacredito/', 'servicioController@datacredito')->name('datacredito');