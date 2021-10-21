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

/* Route::get('/', function () {
       return 'Olá, seja bem-vindo!';
}); */

Route::get('/', 'PrincipalController@principal'); /* Versão 7.0 do láravel */
/* Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal']);  Versão 8.0 do láravel */

Route::get('/sobre-nos', 'SobreNosController@sobreNos'); /* Versão 7.0 do láravel */
/* Route::get('/sobre-nos', [\App\Http\Controllers\SobreNosController::class, 'sobreNos']);  Versão 8.0 do láravel */

Route::get('/contato', 'ContatoController@contato'); /* Versão 7.0 do láravel */
/* Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato']);  Versão 8.0 do láravel */

/* Desmembramento:
   Route::get($uri, $callback){} - $uri:O caminho(rota) e $callback: Uma ação a ser executada. */
