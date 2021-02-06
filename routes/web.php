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

Route::get('/Disponibilidad', 'DisponibilidadController@index')->name('diponibilidad');

Route::get('/disponibilidad', 'DisponibilidadController@index')->name('disp');
Route::get('/disponibilidad/show', 'DisponibilidadController@show')->name('show');

Route::get('/Operadores', 'OperadorController@index')->name('operadores');
Route::post('/Operadores', 'OperadorController@store')->name('addoperador');
Route::put('/Operadores', 'OperadorController@update')->name('editoperador');

Route::get('/Maquinas', 'MaquinaController@index')->name('maquinas');
Route::post('/Maquinas', 'MaquinaController@store')->name('addmaquina');
Route::put('/Maquinas', 'MaquinaController@update')->name('edimaquina');

Route::get('/Clientes', 'ClienteController@index')->name('clientes');
Route::post('/Clientes', 'ClienteController@store')->name('addcliente');
Route::put('/Clientes', 'ClienteController@update')->name('editcliente');

Route::get('/Servicios', 'ServicioController@index')->name('servicios');
Route::post('/Servicios', 'ServicioController@store')->name('addservicio');
Route::put('/Servicios', 'ServicioController@update')->name('ediservicio');

Route::get('/Vendedores', 'VendedorController@index')->name('vendedores');
Route::post('/Vendedores', 'VendedorController@store')->name('addvendedor');
Route::put('/Vendedores', 'VendedorController@update')->name('edivendedor');

Route::post('/ServiciosF', 'FacturaController@store');

Route::put('/Relacion', 'Relacion_Servicio_MaquinaController@update');

Route::post('/AjaxRequestServ', 'ServicioController@store');

Route::post('/AjaxRequest', 'Relacion_Servicio_MaquinaController@ajaxRequestPost');
// Route::put('/Relacionedit', 'Relacion_Servicio_MaquinaController@update2');

Route::get('/Logs', 'LogsController@index')->name('logs');
Route::post('/Logs', 'LogsController@create');

Route::get('/', function(){
    return view('auth.login');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/Registrar', function(){
    return view('auth.register');
})->name('registrar');
