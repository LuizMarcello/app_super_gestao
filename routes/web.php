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

//Essas rotas são "publicas" no sistema:
//São rotas "nomeadas"
Route::get('/', 'PrincipalController@principal')->name('site.index'); /* Versão 7.0 do láravel */
/* Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal']);
  Versão 8.0 do láravel */

Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos'); /* Versão 7.0 do láravel */
/* Route::get('/sobre-nos', [\App\Http\Controllers\SobreNosController::class, 'sobreNos']);
  Versão 8.0 do láravel */

Route::get('/contato', 'ContatoController@contato')->name('site.contato'); /* Versão 7.0 do láravel */
/* Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato']);
  Versão 8.0 do láravel */

Route::get('/login', function(){ return 'Login'; })->name('site.login');

//Agrupando essas rotas. Serão "privadas" no sistema.
//Acrescentando o prefixo "app".
//São rotas nomeadas.
Route::prefix('/app')->group(function() {
    Route::get('/clientes', function(){ return 'Clientes'; })->name('app.clientes');
    Route::get('/fornecedores', function(){ return 'fornecedores'; })->name('app.fornecedores');
    Route::get('/produtos', function(){ return 'produtos'; })->name('app.produtos');
});

//Redirecionamento de rotas:
Route::get('/rota1', function(){
    echo 'Rota 1';
})->name('site.rota1');

Route::get('rota2', function(){
    return redirect()->route('site.rota1');
})->name('site.rota2');

/*
Route::redirect('/rota2','rota1');
*/

//Rota de contingência(fallback): Será fornecida
//caso a rota informada não seja encontrada.
Route::fallback(function() {
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">Clique aqui</a> para ir para página inicial.';
});







