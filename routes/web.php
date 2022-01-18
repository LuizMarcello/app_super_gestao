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
//Chamando este middleware aqui na rota, pelo seu "apelido" configurado em Kernel.php($routeMiddleware)
Route::get('/', 'PrincipalController@principal')->name('site.index')->middleware('log.acesso');
/* Versão 7.0 do láravel */
/* Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal']);
  Versão 8.0 do láravel */

Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos'); /* Versão 7.0 do láravel*/
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

//Assim, vindo da url normal(get)
//Com o interrogação, o parâmetro não é mais obrigatório.
Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');

//Assim, vindo do formulário(post)
Route::post('/login', 'LoginController@autenticar')->name('site.login');

//Agrupando essas rotas. Serão "privadas" no sistema.
//Só poderão ser usadas se o usuário estiver autenticado
//Acrescentando o prefixo "app" no agrupamento.
//São rotas nomeadas.
//Terão middlewares com apelidos e encadeados.
//Passando parâmetros para o middleware: O método handle() no midleware irá receber.
Route::middleware('autenticacao:padrao,administrador,p3,p4')->prefix('/app')->group(function () {

    Route::get('/home', 'HomeController@index')->name('app.home');

    Route::get('/sair', 'LoginController@sair')->name('app.sair');

    Route::get('/cliente', 'ClienteController@index')->name('app.cliente');

    //Rota "get": acessada diretamente pelo browser
    Route::get('/fornecedor', 'FornecedorController@index')->name('app.fornecedor');

    //Rota "post": Que vem do formulário.
    Route::post('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');

    //Rota "get": acessada diretamente pelo browser (tbém paginação(paginate))
    Route::get('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');

    //Rota "get": acessada diretamente pelo browser
    Route::get('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');

    //Rota "post": Que vem do formulário
    Route::post('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');

    //Parâmetros: id oprigatório e msg opcional
    Route::get('/fornecedor/editar/{id}/{msg?}', 'FornecedorController@editar')->name('app.fornecedor.editar');

    //Parâmetros: id oprigatório
    Route::get('/fornecedor/excluir/{id}', 'FornecedorController@excluir')->name('app.fornecedor.excluir');

    //Resource "produto"
    //Porque o controller(ProdutoController) foi criado com o "resource"
    //Uma única rota para todo o controller
    Route::resource('produto', 'ProdutoController');
});

//Encaminhando parâmetros da rota para o controlador:
Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('teste');

//Rota de contingência(fallback): Será fornecida
//caso a rota informada não seja encontrada.
Route::fallback(function () {
    echo 'A rota acessada não existe. <a href="' . route('site.index') . '">Clique aqui</a> para ir
    para página inicial.';
});
