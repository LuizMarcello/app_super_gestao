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

        //Iniciando a sessão do php
        session_start();

        if (isset($_SESSION['email']) && $_SESSION['email'] != '') {
            //A requisição será enviada para o passo seguinte.
            return $next($request);
        } else {
            return redirect()->route('site.login', ['erro' => 2]);
        }
    }
}
