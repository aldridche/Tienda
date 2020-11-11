<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => ['web']], function () {
    //

    route::get('dashboard', 'Desktop\DashboardController@index');
    // route::get('ventas', 'Ventas\VentasController@index');
    // route::get('producto', 'Ventas\ProductoController@index');
    // route::get('clientes', 'Ventas\ClientesController@index');

    route::resource('ventas', 'Ventas\VentasController');
    route::resource('producto', 'Ventas\ProductoController');
    route::resource('clientes', 'Ventas\ClientesController');



    // no es util
    route::get('panel', 'Desktop\AdministratorController@panel' );
    route::get('access', 'Desktop\AdministratorController@access' );
    route::get('reports', 'Desktop\AdministratorController@reports' );

});
