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

//ROTA PÁGINA DE INÍCIO
Route::get('/', function () {
    return view('inicio');
});

//ROTA GALERIA DE FOTOS
Route::view('galeria', 'gallery');

//ROTA PÁGINA SOBRE NÓS
Route::view('sobre', 'about');

//ROTA PÁGINA CONTATO
Route::view('contato', 'contact');

//ROTA PAINEL ADMINISTRADOR
Route::view('administracao/painel', 'admin/painel');

//ROTA PAINEL ADMINISTRADOR/USUARIOS
Route::view('administracao/usuarios', 'admin/users');


//----------------------------------------------------------------------//
//                          CONTROLLER ROUTES                           //
//----------------------------------------------------------------------//

Route::post('/addUserFormSubmit','UsersController@addUserformSubmit');



//----------------------------------------------------------------------//
//                          DATABASE ROUTES                             //
//----------------------------------------------------------------------//

//Listar usuários do bd
Route::get('administracao/usuarios','UsersController@listUsers');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
