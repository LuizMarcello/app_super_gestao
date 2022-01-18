@extends('app.layouts.basico')

{{-- Envio de "parâmetro" para o template extendido --}}
{{-- Neste casso, a variável "$titulo" está vindo do controller --}}
@section('titulo', 'Fornecedor')

{{-- Envio de "bloco html" para o template extendido --}}
@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Fornecedor - Listar</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">

            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Site</th>
                            <th>UF</th>
                            <th>E-mail</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($fornecedores as $fornecedor)
                            <tr>
                                <td>{{ $fornecedor->nome }}</td>
                                <td>{{ $fornecedor->site }}</td>
                                <td>{{ $fornecedor->uf }}</td>
                                <td>{{ $fornecedor->email }}</td>
                                {{-- Sempre que clicamos num link, usamos o verbo "GET" --}}
                                <td><a href="{{ route('app.fornecedor.excluir', $fornecedor->id) }}">Excluir</a></td>
                                {{-- Sempre que clicamos num link, usamos o verbo "GET" --}}
                                <td><a href="{{ route('app.fornecedor.editar', $fornecedor->id) }}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- appends(): Faz o filtro usado na pesquisa acompanhar todas as páginas do "paginate"(no action do controller) --}}
                {{ $fornecedores->appends($request)->links() }}
                <br>

                {{-- Alguns métodos herdados de paginate() --}}
                {{-- {{ $fornecedores->count() }} - Total de registros por página
                <br>
                {{ $fornecedores->total() }} - Total de registros da consulta
                <br>
                {{ $fornecedores->firstItem() }} - Número do primeiro registro da página
                <br>
                {{ $fornecedores->lastItem() }} - Número do último registro da página --}}

                Exibindo {{ $fornecedores->count() }} fornecedores de {{ $fornecedores->total() }} (de
                {{ $fornecedores->firstItem() }} a {{ $fornecedores->lastItem() }})

            </div>
        </div>

    </div>

@endsection
