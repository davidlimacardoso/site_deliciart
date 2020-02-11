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

Route::view('/erro', 'admin/layouts/erro');

//----------------------------------------------------------------------//
//                          CONTROLLER ROUTES                           //
//----------------------------------------------------------------------//

//Dados do formulario via post para cadastrar usuário
Route::post('/addUserFormSubmit','UsersController@addUserformSubmit');

//Desativar usuário
Route::get('/disableUser/{id}/{nomeUser}','UsersController@disableUser');
//Route::post('/disableUser/{id}','UsersController@disableUser');

//Editar usuário
Route::post('/editUserFormSubmit','UsersController@editUserFormSubmit');


//----------------------------------------------------------------------//
//                          DATABASE ROUTES                             //
//----------------------------------------------------------------------//

//Listar usuários do bd para página usuários
Route::get('administracao/usuarios','UsersController@usersPage');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
