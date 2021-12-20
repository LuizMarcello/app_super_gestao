<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

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

        //Recuperando os dados do banco de dados.
        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato(teste)', 'motivo_contatos' => $motivo_contatos]);
    }

    //Se a requisição vier pelo método "POST"(formulário), cai neste método:
    public function salvar(Request $request)
    {
        //Um array associativo
        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos', //Caracteres: min.3 e max.40
            'telefone' => 'required',
            /* 'email' => 'required' */
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:1000'
        ];

        //Um array associativo
        $feedback = [
            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres.',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'nome.unique' => 'O nome informado já está em uso',
            'email.email' => 'O campo e-mail precisa ser preenchido com um e-mail válido',
            'mensagem.max' => 'O campo mensagem deve ter no máximo 1000 caractéres.',

            /* Genérica */
            /* As mensagens específicadas para cada mensagem acima, sobrepõe as genéricas abaixo */
            'required' => 'O campo :attribute deve ser preenchido'
        ];

        //Antes do láravel dar êrros, precisamos realizar a validação
        //dos dados do formulário recebidos no request, neste ponto.
        /* Como 1º parâmetro do validate(): Um array associativo com as regras de validação */
        /* Como 2º parâmetro do validate(), outro array associativo com as mensagens de feedback
           que devem ser atribuidas para cada campo nas mensagens de êrro  */
        $request->validate($regras, $feedback);

        //Após a validação, fazendo então a persistência dos dados no bd.
        SiteContato::create($request->all());

        //Após a persistência dos dados, redireciona para a página raiz da aplicação.
        return redirect()->route('site.index');
    }
}
