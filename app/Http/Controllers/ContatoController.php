<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;

class ContatoController extends Controller
{
    //Como parâmetro, a variável $request "tipada" como Request.
    public function contato(Request $request)
    {
        /* Enviando para a renderização da view, como segundo parâmetro, um array
           associativo, cujo índice, será a variável na "section" da view. */
        /* Os dados do formulário da view são encaminhados aqui, para a mesma
           rota que é utilizada para exibir este mesmo formulário  */
        /*  var_dump($_GET); */ /* Super global "GET" */
        /* var_dump($_POST); */ /* Super global "POST" */

        /*
        echo '<pre>';
        print_r($request->all());
        echo '</pre>';
        echo $request->input('nome');
        echo '<br>';
        echo $request->input('email');
        */

        /* $contato = new SiteContato(); */

        /* Salvando os atributos do objeto no bd */

        // Assim:
        /*
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');

        //print_r($contato->getAttributes());
        $contato->save();
        */

        // Assim:
        //"fill()":Preenche os atributos do objeto através
        //de um array associativo, no caso, $request->all().
        /*
        $contato->fill($request->all());
        $contato->save();
        //print_r($contato->getAttributes());
        */

        // Assim:
        // Também baseado num array associativo.
        /* $contato->create($request->all()); */

        return view('site.contato', ['titulo' => 'Contato(teste)']);
    }

    //Se a requisição vier pelo método "POST"(formulário), cai neste método:
    public function salvar(Request $request)
    {
        //Antes do láravel dar êrros, precisamos realizar a validação
        //dos dados do formulário recebidos no request, neste ponto.
        $request->validate([
            'nome' => 'required|min:3|max:40', //Caracteres: min.3 e max.40
            'telefone' => 'required',
            'email' => 'required',
            'motivo_contato' => 'required',
            'mensagem' => 'required|max:1000'

        ]);
        /* SiteContato::create($request->all()); */
    }
}
