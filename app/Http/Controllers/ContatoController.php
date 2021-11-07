<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato()
    {
        /* Enviando para a renderização da view, como segundo parâmetro, um array
           associativo, cujo índice, será a variável na "section" da view. */
        return view('site.contato', ['titulo' => 'Contato(teste)']);
    }
}
