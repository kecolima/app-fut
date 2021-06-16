<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', "AuthController@showLoginForm")->name('admin.login');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', "AuthController@dashboard")->name('admin');
Route::get('/admin/login', "AuthController@showLoginForm")->name('admin.login');
Route::get('/admin/logout', "AuthController@logout")->name('admin.logout');
Route::get('/admin/login/do', "AuthController@login")->name('admin.login.do');
Route::get('/login', "AuthController@showLoginForm")->name('admin.login');

Route::get('/painel', "PainelController@ver")->name('mostrar_painel');

Route::get('/usuario/novo', "UsuariosController@create");
Route::post('/usuario/novo', "UsuariosController@store")->name('salvar_usuario');
Route::get('/usuario/ver', "UsuariosController@show")->name('ver_usuario');
Route::get('/usuario/deletar/{id}', "UsuariosController@destroy")->name('excluir_usuario');
Route::get('/usuario/editar/{id}', "UsuariosController@edit")->name('editar_usuario');
Route::post('/usuario/editar/{id}', "UsuariosController@update")->name('atualizar_usuario');

Route::get('/jogador/novo', "JogadorController@create");
Route::post('/jogador/novo', "JogadorController@store")->name('salvar_jogador');
Route::get('/jogador/ver', "JogadorController@show")->name('ver_jogador');
Route::get('/jogador/deletar/{id}', "JogadorController@destroy")->name('excluir_jogador');
Route::get('/jogador/editar/{id}', "JogadorController@edit")->name('editar_jogador');
Route::post('/jogador/editar/{id}', "JogadorController@update")->name('atualizar_jogador');

Route::get('/presenca/novo', "PresencaController@create");
Route::post('/presenca/novo', "PresencaController@store")->name('salvar_presenca');
Route::get('/presenca/ver', "PresencaController@show")->name('ver_presenca');
Route::get('/presenca/deletar/{id}', "PresencaController@destroy")->name('excluir_presenca');
Route::get('/presenca/editar/{id}', "PresencaController@edit")->name('editar_presenca');
Route::post('/presenca/editar/{id}', "PresencaController@update")->name('atualizar_presenca');
Route::get('/presenca/partida/{id}', "PresencaController@partida")->name('ver_partida');
