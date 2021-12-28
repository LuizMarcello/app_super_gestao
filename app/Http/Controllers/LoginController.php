<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        //O método get() serve para recuperar os atributos do Request,
        //enviados tanto pelos métodos GET como POST.
        $erro = '';

        if($request->get('erro') == 1) {
            $erro = 'Usuário e/ou senha não existe.';
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request)
    {
        //As regras de validação
        $regras = [
            //Chaves: campo "name" do formulário.
            'usuario' => 'email',
            'senha' => 'required'
        ];

        //As mensagens de feedback de validação
        $feedback = [
            'usuario.email' => 'O campo usuário (e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        //Se não passar pelo validate(), ou seja, não for validado,
        //será redirecionado para a rota antiga. value={{ old() }} no formulário.
        $request->validate($regras, $feedback);

        //Recuperando os parâmetros do formulário de login
        //Usando os campos "name" do formulário de login
        $email = $request->get('usuario');
        $password = $request->get('senha');

        echo "Usuário: $email | Senha: $password";
        echo '<br>';
        echo '<br>';

        //Iniciar o Model "User"
        $user = new User();

        //Método "first()": o primeiro existente na collection.
        $usuario = $user->where('email', $email)
        ->where('password', $password)
        ->get()
        ->first();

        if(isset($usuario->name)){
            echo 'Usuário existeee';
        } else {
            //Se houver um êrro no processo de autenticação, enviando um segundo
            //parâmetro para o redirect(), em um array associativo.
            //Indice: erro | valor 1
            //Redirecionado para o "login get" no web.php
            return redirect()->route('site.login', ['erro' => 1]);
        }

        //Tag <pre>: para formatar, facilitar a leitura
        echo '<pre>';
        /* print_r($usuario); */
        echo '</pre>';


        /* print_r($request->all()); */
    }
}
