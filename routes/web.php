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
    return view('matricula');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

route::get('/matricula', function(){
    return view('matricula');
});

Route::post('/matricula','PesquisarController@verificar')->name('pesquisar.verificar');

Route::resource('/destino', 'DestinoController');
