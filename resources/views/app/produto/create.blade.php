@extends('app.layouts.basico')

{{-- Envio de "parâmetro" para o template extendido --}}
{{-- Neste casso, a variável "$titulo" está vindo do controller --}}
@section('titulo', 'Produto')

{{-- Envio de "bloco html" para o template extendido --}}
@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            {{-- Esta view antes era usada para "inclusão" e "edição"
                 se o "id" estiver definido, significa que é "edição"
                 Ambas as funções ficavam só nessa view --}}
            {{-- @if (isset($produto->id))
                <p>Editar Produto</p>
            @else --}}
            <p>Adicionar Produto</p>
            {{-- @endif --}}
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                {{-- Todas as variáveis utilizadas no contexto de uma view que está sendo
                     incluída como um componente, precisam ser encaminhas juntamente ao
                     referido componente, como 2º parâmetro, em um array associativo --}}
                @component('app.produto._components.form_create_edit', ['unidades' => $unidades])
                    {{-- Aqui ficava o formulário. Virou um componente --}}
                @endcomponent
            </div>
        </div>

    </div>

@endsection
