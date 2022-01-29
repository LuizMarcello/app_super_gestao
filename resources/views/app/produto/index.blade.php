@extends('app.layouts.basico')

{{-- Envio de "parâmetro" para o template extendido --}}
{{-- Neste casso, a variável "$titulo" está vindo do controller --}}
@section('titulo', 'Produto')

{{-- Envio de "bloco html" para o template extendido --}}
@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Listagem de Produtos</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">

            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Peso</th>
                            <th>Unidade Id</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        {{-- Percorrendo um array de objetos do tipo "produtos" --}}
                        @foreach ($produtos as $produto)
                            <tr>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->descricao }}</td>
                                <td>{{ $produto->peso }}</td>
                                <td>{{ $produto->unidade_id }}</td>

                                {{-- Visualizando o item --}}
                                {{-- Sempre que clicamos num link, usamos o verbo "GET" --}}
                                <td><a href="{{ route('produto.show', ['produto' => $produto->id]) }}">Visualizar</a></td>

                                {{-- Deletando o item --}}
                                {{-- Sempre que clicamos num link, usamos o verbo "GET" --}}
                                <td>
                                    <form id="form_{{ $produto->id }}" method="POST" action="{{ route('produto.destroy', ['produto' => $produto->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        {{-- Submetendo o formulário com submit--}}
                                        {{--  <button type="submit">Excluir</button> --}}
                                        {{-- ou assim com link e usando javascript --}}
                                        <a href="#" onclick="document.getElementById('form_{{ $produto->id }}').submit()">Excluir</a>
                                    </form>
                                </td>

                                {{-- Editando o item --}}
                                {{-- Sempre que clicamos num link, usamos o verbo "GET" --}}
                                <td><a href="{{ route('produto.edit', ['produto' => $produto->id]) }}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- appends(): Faz o filtro usado na pesquisa acompanhar todas as páginas do
                     "paginate"(no action do controller) --}}
                {{ $produtos->appends($request)->links() }}
                <br>

                {{-- Alguns métodos herdados de paginate() --}}
                {{-- {{ $produtos->count() }} - Total de registros por página
                <br>
                {{ $produtos->total() }} - Total de registros da consulta
                <br>
                {{ $produtos->firstItem() }} - Número do primeiro registro da página
                <br>
                {{ $produtos->lastItem() }} - Número do último registro da página --}}

                Exibindo {{ $produtos->count() }} produtos de {{ $produtos->total() }} (de
                {{ $produtos->firstItem() }} a {{ $produtos->lastItem() }})

            </div>
        </div>

    </div>

@endsection
