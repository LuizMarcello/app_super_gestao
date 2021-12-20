<?php

namespace App\Http\Middleware;

use Closure;
use App\LogAcesso;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /* Manipulando o "$request" recebido por parâmetro do navegador ou de outra plicação */
        /* O método $next() "empurra" a requisição pra frente. */
        // return $next($request);
        /* Manipulando o "response" devolvido ao navegador ou a outra aplicação */
        /* O método "Response()" forma um objeto de resposta "response hhttp" (resposta devolvida)
           que é o conteúda da resposta. */
        /* O "dd()" também forma um método "response" (objeto de resposta)*/
        /* Então aqui, por ser um middleware, tem que ser o "dd()", porque o "print_r()" não
           forma um objeto de resposta, então daria êrro */

        // dd($request);

        /* Parâmetros abaixo conseguido na resposta do "dd($request)" acima */
        /* Recuperando o ip remoto */
        $ip = $request->server->get('REMOTE_ADDR');

        /* Recuperando a rota acessada. */
        $rota = $request->getRequestUri();

        /* Com aspas duplas, é possível simplesmente interpolar a string abaixo com as variáveis
           criadas acima, sem ter que ficar concatenando. */
        /* Salvando no banco de dados: */
        LogAcesso::create(['log' => "IP $ip requisitou a rota $rota"]);
        return Response('Chegamos até o middleware e finalizamos no próprio middwlare');
    }
}
