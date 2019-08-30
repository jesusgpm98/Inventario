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
    return view('login/login');
})->name('login_view');

//login
Route::post('/login', 'Auth\LoginController@login')->name('user.login');
Route::post('/logout', 'Auth\LoginController@logout')->name('user.logout');

//Crear usuario
Route::get('/user/new', 'Auth\LoginController@create')->name('user.create');
Route::post('/user', 'Auth\LoginController@store')->name('user.createUser');

//pagina inicio
Route::get('/productos', 'ProductoController@index')->name('productos.index');

//buscar pagos por fechas
Route::get('productos/buscar', 'ProductoController@buscar')->name('productos.buscar');

//listado de todo lo pagado
Route::post('/productos/listadoPago', 'ProductoController@listar')->name('productos.listar');

//agregar el pedido
Route::post('/productos/nuevo', 'ProductoController@store')->name('productos.store');

//eliminar el ingreso del pedido
Route::delete('/productos/{producto}', 'ProductoController@destroy')->name('productos.destroy');
