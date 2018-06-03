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

Auth::routes();

Route::get('/estatisticas', 'HomeController@mostrarEstatisticas');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/buscarPetshopPorNome', 'HomeController@buscarPetshopPorNome');
Route::get('/buscarPetshopPorAvaliacao', 'HomeController@buscarPetshopPorAvaliacao');
Route::get('/buscarPetshopPorServico', 'HomeController@buscarPetshopPorServico');
Route::get('/buscarPetshopPorCidade', 'HomeController@buscarPetshopPorCidade');

// Route::get('/', 'PetshopController@index');
Route::post('/petshop', 'PetshopController@store')->name('petshop.store');
Route::get('/petshop/create', 'PetshopController@create');
Route::get('/petshop/meusPetshops', 'PetshopController@mostrarMeusPetshops');
Route::post('/petshop/salvarAvaliacao', 'PetshopController@salvarAvaliacao');
Route::get('/petshop/buscarAvaliacao', 'PetshopController@buscarAvaliacao');
Route::get('/petshop/{id}', 'PetshopController@show')->name('petshop.show');
Route::get('/petshop/{id}/buscarHorarios', 'AgendaController@buscarHorarios'); //Mostra os horários disponíveis p/ agendamento, de acordo com a data selecionada (tela do petshop)
Route::post('/petshop/{id}/marcarHorario', 'AgendaController@marcarHorario');
Route::get('/petshop/{id}/buscarHorariosMarcados', 'AgendaController@buscarHorariosMarcados');
// Route::get('/petshop/{id}/edit', 'PetshopController@edit');
// Route::put('/petshop/{id}', 'PetshopController@update');
// Route::delete('/petshop/{id}', 'PetshopController@destroy');

// Route::prefix('/usuario')->group(function(){
Route::middleware('petshop.owner')->prefix('/admin')->group(function(){
    Route::get('/{id}', 'PetshopController@showAdmin')->name('admin');
    Route::get('/{id}/edit', 'PetshopController@edit')->name('admin.editar');
    Route::post('/{id}/update', 'PetshopController@update')->name('admin.update');
    Route::get('/{id}/animais', 'PetshopServicoRacaController@create')->name('admin.servicoRaca');
    Route::post('/{id}/animais', 'PetshopServicoRacaController@store')->name('admin.servicoRaca.novo');
    Route::get('/{id}/servicos', 'PetshopServicoController@create')->name('admin.servicos');
    Route::post('/{id}/servicos', 'PetshopServicoController@store')->name('admin.servicos.store');
    Route::get('/{id}/buscarPrecos', 'PetshopServicoRacaController@buscarPrecos');
    Route::get('/{id}/funcionarios', 'FuncionarioController@create')->name('admin.funcionarios');
    Route::get('/{id}/funcionarios/buscarFuncionarios', 'FuncionarioController@buscarFuncionarios');
    Route::post('/{id}/funcionarios', 'FuncionarioController@store')->name('admin.funcionarios.store');
    Route::post('/{id}/funcionariopetshops', 'FuncionarioPetshopController@store')->name('admin.funcionariopetshops.store');
    Route::get('/{id}/buscarAgenda', 'AgendaController@buscarAgenda');
    Route::post('/{id}/alterarStatusHorario', 'AgendaController@alterarStatusHorario');
});

Route::get('/petshopservicoraca/{id}/buscarPreco', 'PetshopServicoRacaController@buscarPreco');

Route::get('/servico', 'ServicosController@index');
Route::post('/servico', 'ServicosController@store')->name('servico.store');
Route::get('/servico/create', 'ServicosController@create');

Route::get('/petshopServico', 'PetshopServicoController@index');
Route::post('/petshopServico', 'PetshopServicoController@store')->name('petshopServico.store');
Route::get('/petshopServico/{id}/create', 'PetshopServicoController@create')->name('petshopServico.create');

Route::get('/agenda', 'AgendaController@index');
Route::post('/agenda/desmarcarHorario', 'AgendaController@desmarcarHorario');