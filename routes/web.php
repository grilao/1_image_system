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


// IMAGEM
Route::get('/', function () {
    return view('image.create');
});

Route::resource('image', 'ImageController');


// TEMPLATE
Route::get('template', function() {
    return view('template.create');
});

Route::resource('template', 'TemplateController');


// AJUDA
// Route::get('ajuda', function () {
//     return view('help.ajuda');
// });

// Route::get('mapa', function () {
//     return view('help.mapa');
// });