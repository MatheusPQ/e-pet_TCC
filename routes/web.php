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
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/petshop', 'PetshopController@index');
Route::get('/petshop/create', 'PetshopController@create');
Route::post('/petshop', 'PetshopController@store')->name('petshop.store');
Route::get('/petshop/{id}', 'PetshopController@show');  
Route::get('/petshop/{id}/edit', 'PetshopController@edit');
Route::put('/petshop/{id}', 'PetshopController@update');
Route::delete('/petshop/{id}', 'PetshopController@destroy');