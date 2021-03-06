<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class FornecedorController extends Controller
{
    public function index()
    {
        return view('app.fornecedor.index');
    }



    public function listar(Request $request)
    {
        $fornecedores = Fornecedor::where('nome', 'like', '%' . $request->input('nome') . '%')
            ->where('site', 'like', '%' . $request->input('site') . '%')
            ->where('uf', 'like', '%' . $request->input('uf') . '%')
            ->where('email', 'like', '%' . $request->input('email') . '%')
            ->paginate(3);

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }




    public function adicionar(Request $request)
    {
        $msg = '';

        //Validando o token enviado pelo formulário (@csrf) (post/formulário)
        //Será inclusão: Se o token existir (não estiver vazio) e se o "id" estiver vazio.
        if ($request->input('_token') != '' && $request->input('id') == '') {
            //Validação dos dados
            //Array associativo
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];

            //Mansagens de feedback
            //Array associativo
            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
                'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
                'uf.min' => 'O campo uf deve ter no mínimo 2 caracteres',
                'uf.max' => 'O campo uf deve ter no máximo 2 caracteres',
                'email.email' => 'O campo e-mail não foi preenchido corretamente'
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            //Para cadastro com sucesso:
            //redirect
            //ou
            //dados para a view
            $msg = 'Cadastro realizado com sucesso';
        }

        //Validando o token enviado pelo formulário (@csrf) (post/formulário)
        //Será edição: Se o token existir (não estiver vazio) e se o "id" for diferente de vazio.
        if ($request->input('_token') != '' && $request->input('id') != '') {
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if ($update) {
                $msg = 'Atualização realizada com sucesso';
            } else {
                $msg =  'Atualização apresentou problemas';
            }

            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'msg' => $msg]);
        }

        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function editar($id, $msg = '')
    {
        /* echo $id; */
        $fornecedor = Fornecedor::find($id);

        /*  dd($fornecedor); */
        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }

    public function excluir($id)
    {
        /* Diferença: Aspas simples: tem que concatenar string com variável */
        /* Aspas duplas: não precisa concatenar, faz a interpolação de string com variável */
        /* echo 'Remover o registro de ID' . $id; */
        /* echo "Remover o registro de ID $id"; */

        /* Foi implementado o "softdelete" no model, então no bd, apenas será inserida
           a data de exclusão na coluna específica. Continuará no bd  */
        // Fornecedor::find($id)->delete();

        /* Assim apagará definitivamente no bd, mesmo com softdelete. */
        Fornecedor::find($id)->forceDelete();

        return redirect()->route('app.fornecedor');
    }
}
