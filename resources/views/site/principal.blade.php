{{-- Determina qual o template a ser usado na view --}}
@extends('site.layouts.basico')

{{-- Envio de "parâmetro" para o template extendido --}}
@section('titulo', 'Home')

{{-- Envio de "bloco html" para o template extendido --}}
@section('conteudo')

    {{-- Incluindo esta partialView aqui, ou direto no template --}}
    {{-- @include('site.layouts._partialsViews.topo') --}}

    <div class="conteudo-destaque">

        <div class="esquerda">
            <div class="informacoes">
                <h1>Sistema Super Gestão</h1>
                <p>Software para gestão empresarial ideal para sua empresa.
                <p>
                <div class="chamada">
                    <img src="{{ asset('img/check.png') }}">
                    <span class="texto-branco">Gestão completa e descomplicada</span>
                </div>
                <div class="chamada">
                    <img src="{{ asset('img/check.png') }}">
                    <span class="texto-branco">Sua empresa na nuvem</span>
                </div>
            </div>

            <div class="video">
                <img src="{{ asset('img/player_video.jpg') }}">
            </div>
        </div>

        <div class="direita">
            <div class="contato">
                <h1>Contato</h1>
                <p>Caso tenha qualquer dúvida por favor entre em contato com nossa equipe pelo formulário abaixo.
                <p>
                    {{-- Incluindo este componente aqui --}}
                     {{-- Enviando parâmetros específicos adicionais para este componente,
                          agora por aqui, através da "chamada do componente, como segundo
                          parâmetro, usando um array associativo": --}} {{-- Esta classe já existe no css --}}
                    @component('site.layouts._components.form_contato', ['classe' => 'borda-branca',
                    'motivo_contatos' => $motivo_contatos])
                    @endcomponent

            </div>
        </div>
    </div>
@endsection
