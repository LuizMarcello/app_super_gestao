<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;

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
//Atribuindo a chamada deste middleware diretamente na rota.
/* Route::middleware(LogAcessoMiddleware::class) */

Route::get('/', 'PrincipalController@principal')->name('site.index'); /* Versão 7.0 do láravel */
/* Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal']);
  Versão 8.0 do láravel */

Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos'); /* Versão 7.0 do láravel */
/* Route::get('/sobre-nos', [\App\Http\Controllers\SobreNosController::class, 'sobreNos']);
  Versão 8.0 do láravel */

//Atribuindo a chamada deste middleware diretamente na rota.
Route::get('/contato', 'ContatoController@contato')->name('site.contato');
    /* ->middleware(LogAcessoMiddleware::class); */ /* Versão 7.0 do láravel */
/* Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato']);
  Versão 8.0 do láravel */

Route::post('/contato', 'ContatoController@salvar')->name('site.contato'); /* Versão 7.0 do láravel */
/* Route::post('/contato', [\App\Http\Controllers\ContatoController::class, 'contato']);
  Versão 8.0 do láravel */

Route::get('/login', function () {return 'Login';})->name('site.login');

//Agrupando essas rotas. Serão "privadas" no sistema.
//Acrescentando o prefixo "app" no agrupamento.
//São rotas nomeadas.
Route::prefix('/app')->group(function () {
    Route::get('/clientes', function () {
        return 'Clientes';
    })->name('app.clientes');
    Route::get('/fornecedores', 'FornecedorController@index')->name('app.fornecedores');
    Route::get('/produtos', function () {
        return 'produtos';
    })->name('app.produtos');
});

//Encaminhando parâmetros da rota para o controlador:
Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('teste');

//Rota de contingência(fallback): Será fornecida
//caso a rota informada não seja encontrada.
Route::fallback(function () {
    echo 'A rota acessada não existe. <a href="' . route('site.index') . '">Clique aqui</a> para ir
    para página inicial.';
});
