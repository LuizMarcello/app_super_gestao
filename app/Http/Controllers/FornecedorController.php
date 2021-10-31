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
                'cnpj' => null
            ],
            1 => [
                'nome' => 'fornecedor 2',
                'status' => 'S'

            ]
        ];

        /* return view('app.fornecedor.index', compact('fornecedores')); */
        /* return view('app.fornecedor.index@if@else', compact('fornecedores')); */
        /* return view('app.fornecedor.index@unless', compact('fornecedores')); */
        /* return view('app.fornecedor.index@isset', compact('fornecedores')); */
        return view('app.fornecedor.index@empty', compact('fornecedores'));
    }
}
