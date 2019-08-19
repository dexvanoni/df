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

/*Route::get('/', function () {
    return view('welcome');
})->name('inicio');*/
Route::get('/', function () {
    return view('site.index');
})->name('inicio');

Route::get('about', function () {
    return view('site.about');
})->name('about');

Route::get('contatos', function () {
    return view('site.contacts');
})->name('contatos');

Route::get('calculadora', function () {
    return view('welcome');
})->name('calculadora');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/administracao', 'AdministracaoController@index')->name('administracao');
Route::post('mail', 'MailController@envio')->name('mail');
Route::post('insc', 'InscController@envio')->name('insc');
Route::resource('permitidos', 'PermitidosController');
Route::resource('parametros', 'ParametrosController');