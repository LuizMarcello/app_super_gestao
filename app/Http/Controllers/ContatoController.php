<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato()
    {
        /* Enviando para a renderização da view, como segundo parâmetro, um array
           associativo, cujo índice, será a variável na "section" da view. */
        /* Os dados do formulário da view são encaminhados aqui, para a mesma
           rota que é utilizada para exibir este mesmo formulário  */
           var_dump($_GET);
        return view('site.contato', ['titulo' => 'Contato(teste)']);
    }
}
