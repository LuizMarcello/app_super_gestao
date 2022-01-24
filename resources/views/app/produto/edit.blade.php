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
                <form method="POST" action="{{ route('produto.update', ['produto' => $produto->id]) }}">
                    @csrf
                    {{--Verbos http. Requisições:
                        PUT: Os dados que serão trafegados representam o objeto completo do lado do backend
                             Deve atualizar uma entidade por completo. Todos os atributos do objeto.
                        PATCH: Atualiza os atributos parciais de um obejto. Partes de uma entidade.
                        Setando o método "PUT". Laravel entende, do que do lado do backend, deve ter
                        seus dados acessados através do método "PUT" --}}
                    @method('PUT')
                    <input type="text" name="nome" value="{{ $produto->nome ?? old('nome') }}" placeholder="Nome"
                        class="borda-preta">
                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}

                    <input type="text" name="descricao" value="{{ $produto->descricao ?? old('descricao') }}"
                        placeholder="Descrição" class="borda-preta">
                    {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}

                    <input type="text" name="peso" value="{{ $produto->peso ?? old('peso') }}" placeholder="Peso"
                        class="borda-preta">
                    {{ $errors->has('peso') ? $errors->first('peso') : '' }}

                    {{-- Campo "Unidade de medida é estrangeiro" Model Unidade --}}
                    <select name="unidade_id">
                        <option>-- Selecione a Unidade de Medida --</option>
                        @foreach ($unidades as $unidade)
                            <option value="{{ $unidade->id }}"
                                {{ ($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>
                                {{ $unidade->descricao }}
                            </option>
                        @endforeach
                    </select>
                    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>

    </div>

@endsection
