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
        /* Manipulando o "$request" recebido por parâmetro do navegador ou de outra aplicação */
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

        //Assim a requisição vai para o próximo middleware encadeado, se houver.
        //O "$next()" sempre empurra a requsição para a frente.
        //return $next($request);

        //Atribuindo à variável o retôrno de $next($request).
         //O "$next()" sempre empurra a requisição para a frente, mas como retôrno, vem
         //por ele também a resposta do processamento seguinte, que são devolvidas para os
         //midlewares anteriormente encadeados.
        $resposta = $next($request);

        //Manipulandio a resposta do $next($request)
        $resposta->setStatusCode(201, 'O status e o texto da resposta foram modificados.' );

        return $resposta;

        //dd($resposta);

        //return Response('Chegamos até o middleware e finalizamos no próprio middwlare');
    }
}
