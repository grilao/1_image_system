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


// TEMPLATE
Route::get('template', function() {
    return view('template.create');
});

Route::resource('template', 'TemplateController');


// IMAGEM
Route::get('/', function () {
    return view('imagem.create');
});

Route::resource('imagem', 'ImagemController');


// DOWNLOAD
Route::get('aplicarTemplate', 'DownloadController@aplicarTemplate');
Route::get('downloadExcluir', 'DownloadController@downloadExcluir');


// AJUDA
Route::get('/ajuda', 'AjudaController@index')->name('ajuda');


// LOGIN
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
