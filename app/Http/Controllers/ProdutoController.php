<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Produto::paginate(5);

        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function create()
    {
        $unidades = Unidade::all();
        //Passando para a view create.blade.php, '$unidades' como 2º parâmetro
        return view('app.produto.create', ['unidades' => $unidades]);
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* Array associativo que irá conter as regras de validação */
        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:1000',
            'peso' => 'required|integer',
            /* Aqui só terá validade se a informação encaminhada existir
               na tabela "unidades", no campo id
               Para isso, usando o operador de validação, do laravel
               exists:<tabela>,<coluna de referência> */
            'unidade_id' => 'exists:unidades,id',
        ];

        /* Array associativo que irá conter as mensagens customizadas de feedback das validações */
        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'descricao.min' => 'O campo descricao deve ter no mínimo 3 caracteres',
            'descricao.max' => 'O campo descricao deve ter no máximo 1000 caracteres',
            'peso.integer' => 'O campo peso deve ser um número inteiro',
            'unidade_id.exists' => 'A unidade de medida informada não existe'
        ];

        $request->validate($regras, $feedback);

        /* Método create(), porque o Model está com modo macivo ($fillable) */
        Produto::create($request->all());
        return redirect()->route('produto.index');

        /* ou */
        //$produto = new Produto();

        //$nome = $request->get('nome');
        //$descricao = $request->get('descricao');

        /* Por exemplo, fazendo uma tratativa */
        //$nome = strtoupper($nome);

        //$produto->nome = $nome;
        //$produto->descricao = $descricao;

        //$produto->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades]);
        //return view('app.produto.create', ['produto' => $produto, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     *
     * Verbos http. Requisições:
     * PUT: Os dados que serão trafegados representam o objeto completo do lado do backend
     *      Deve atualizar uma entidade por completo. Todos os atributos do objeto.
     * PATCH: Atualiza os atributos parciais de um obejto. Partes de uma entidade.
     */
    public function update(Request $request, Produto $produto)
    {
        //print_r($request->all()); //Representa o payload, os dados úteis da requisição htttp.
        //A parte que interessa desta requisição.
        //echo '<br><br><br>';

        //print_r($produto->getAttributes());  //instância do objeto no estado anterior, antes dos
        //dados serem enviados pelo formulário

        /* Variável que contém a instância do objeto, recebendo os dados da requisição */
        // Estes dados da requisição então irão atualizar potencialmente estes atributos no objeto.
        $produto->update($request->all());
        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index', ['produto' => $produto->id]);
    }
}
