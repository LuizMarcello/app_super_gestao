@extends('app.layouts.basico')

{{-- Envio de "parâmetro" para o template extendido --}}
{{-- Neste casso, a variável "$titulo" está vindo do controller --}}
@section('titulo', 'Produto')

{{-- Envio de "bloco html" para o template extendido --}}
@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Editar Produto</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">

            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                {{-- Verbos http. Requisições:
                        PUT: Os dados que serão trafegados representam o objeto completo do lado do backend
                             Deve atualizar uma entidade por completo. Todos os atributos do objeto.
                        PATCH: Atualiza os atributos parciais de um obejto. Partes de uma entidade.
                        Setando o método "PUT". Laravel entende, do que do lado do backend, deve ter
                        seus dados acessados através do método "PUT" --}}
                {{-- Todas as variáveis utilizadas no contexto de uma view que está sendo
                     incluída como um componente, precisam ser encaminhas juntamente ao
                     referido componente, como 2º parâmetro, em um array associativo --}}
                @component('app.produto._components.form_create_edit', ['produto' => $produto, 'unidades' => $unidades])
                    {{-- Aqui ficava o formulário. Virou um componente --}}
                @endcomponent
            </div>
        </div>

    </div>

@endsection
