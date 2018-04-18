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

// Route::get('/', 'PetshopCon');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

// Route::get('/', 'PetshopController@index');
Route::post('/petshop', 'PetshopController@store')->name('petshop.store');
Route::get('/petshop/create', 'PetshopController@create');
Route::get('/petshop/{id}', 'PetshopController@show')->name('petshop.show');
// Route::get('/petshop/{id}/edit', 'PetshopController@edit');
// Route::put('/petshop/{id}', 'PetshopController@update');
// Route::delete('/petshop/{id}', 'PetshopController@destroy');

Route::get('/admin/{id}', 'PetshopController@showAdmin')->name('admin');
Route::get('/admin/{id}/animais', 'PetshopServicoRacaController@create')->name('admin.servicoRaca');
Route::post('/admin/{id}/animais', 'PetshopServicoRacaController@store')->name('admin.servicoRaca.novo');
Route::get('/admin/{id}/servicos', 'PetshopServicoController@create')->name('admin.servicos');
Route::post('/admin/{id}/servicos', 'PetshopServicoController@store')->name('admin.servicos.store');
Route::get('/admin/{id}/buscarPrecos', 'PetshopServicoRacaController@buscarPrecos');




Route::get('/servico', 'ServicosController@index');
Route::post('/servico', 'ServicosController@store')->name('servico.store');
Route::get('/servico/create', 'ServicosController@create');
// Route::get('/servico/{id}', 'ServicosController@show');
// Route::get('/servico/{id}/edit', 'ServicosController@edit');
// Route::put('/servico/{id}', 'ServicosController@update');
// Route::delete('/servico/{id}', 'ServicosController@destroy');

Route::get('/petshopServico', 'PetshopServicoController@index');
Route::post('/petshopServico', 'PetshopServicoController@store')->name('petshopServico.store');
Route::get('/petshopServico/{id}/create', 'PetshopServicoController@create')->name('petshopServico.create');
// Route::get('/servico/{id}', 'PetshopServicoController@show');
// Route::get('/servico/{id}/edit', 'PetshopServicoController@edit');
// Route::put('/servico/{id}', 'PetshopServicoController@update');
// Route::delete('/servico/{id}', 'PetshopServicoController@destroy');

// Route::get('/servico/{id}/addServicos', 'ServicosController@addServicos')->name('servico.addServicos');
// Route::post('/servico/save', 'ServicosController@save')->name('servico.save');


Route::post('/evento', 'EventoController@store')->name('evento.store');
