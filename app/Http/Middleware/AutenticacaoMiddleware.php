<?php

namespace App\Http\Middleware;

use Closure;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     * 3º e 4º parâmetros, enviados pela rota no web.php
     */
    public function handle($request, Closure $next, $metodo_autenticacao, $perfil, $param3, $param4)
    {
        //A requisição veio do middlaware anterior(encadeado)

        //Verifica se o usuário possui acesso a rota
        echo $metodo_autenticacao . ' - ' . $perfil . '<br>';

        if ($metodo_autenticacao == 'padrao') {
            echo 'Verificar o usuário e senha no banco de dados' . $perfil . '<br>';
        }

        if ($metodo_autenticacao == 'ldap') {
            echo 'Verificar o usuário e senha no AD' . $perfil . '<br>';
        }

        if ($perfil == 'visitante') {
            echo $perfil . ', seu acesso será limitado <br>';
        } else {
            echo 'Você é ' . $perfil  . '. Iremos carregar seu perfil no banco de dados. <br>';
        }

        if (false) {
            //Tendo acesso, a requisição é enviada para frente, para
            //a aplicação(controller, no caso) ou para o próximo middleware
            //encadeado, se houver.
            //O "$next()" sempre empurra a requsição para a frente.
            return $next($request);
        } else {
            //return $next($request);
            return Response('Acesso negado! Rota exige autenticação!!!');
        }
    }
}
