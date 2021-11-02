<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        /* $fornecedores = ['Fornecedor 1']; */
        $fornecedores = [
            0 => [
                'nome' => 'fornecedor 1',
                'status' => 'N',
                'cnpj' => '00.000.000/0000-00',
                'ddd' => '11', //São Paulo (SP)
                'telefone' => '0000-0000'
            ],
            1 => [
                'nome' => 'fornecedor 2',
                'status' => 'S',
                'cnpj' => null,
                'ddd' => '85', //Fortaleza (CE)
                'telefone' => '0000-0000'

            ],
            2 => [
                'nome' => 'fornecedor 3',
                'status' => 'S',
                'cnpj' => null,
                'ddd' => '32', //Juiz de Fora (MG)
                'telefone' => '0000-0000'

            ]
        ];

        /* return view('app.fornecedor.index', compact('fornecedores')); */
        /* return view('app.fornecedor.index@if@else', compact('fornecedores')); */
        /* return view('app.fornecedor.index@unless', compact('fornecedores')); */
        /* return view('app.fornecedor.index@isset', compact('fornecedores')); */
        /*  return view('app.fornecedor.index@empty', compact('fornecedores')); */
        /*  return view('app.fornecedor.index@ternario', compact('fornecedores')); */
        /*  return view('app.fornecedor.index@valordefault', compact('fornecedores')); */
        return view('app.fornecedor.index@switchcase', compact('fornecedores'));
    }
}
