<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Middleware\LogAcessoMiddleware;

class SobreNosController extends Controller
{
    public function __construct()
    {
        /* Adicionando a chamada deste middlware diretamente no construtor deste controller */
        // $this->middleware(LogAcessoMiddleware::class);
        /* Chamando o middleware pelo "apelido" configurado em Kernel.php($routeMiddleware) */
       $this->middleware('log.acesso');
    }

    public function sobreNos()
    {
        return view('site.sobre-nos');
    }
}
