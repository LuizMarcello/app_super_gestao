@extends('site.layouts.basico')

{{-- Envio de "parâmetro" para o template extendido --}}
{{-- Neste casso, a variável "$titulo" está vindo do controller --}}
@section('titulo', $titulo)

{{-- Envio de "bloco html" para o template extendido --}}
@section('conteudo')

    {{-- Incluindo esta partialView aqui, ou direto no template --}}
    {{-- @include('site.layouts._partialsViews.topo') --}}

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Entre em contato conosco</h1>
        </div>

        <div class="informacao-pagina">
            <div class="contato-principal">

                {{-- Incluindo este componente aqui --}}
                {{-- Enviando parâmetros específicos adicionais para este componente,
                     agora por aqui, através da "chamada do componente, como segundo
                     parâmetro, usando um array associativo": --}} {{-- Esta classe já existe no css--}}
                @component('site.layouts._components.form_contato', ['classe' => 'borda-preta',
                 'motivo_contatos' => $motivo_contatos])
                    {{-- Enviando por aqui parâmetros específicos adicionais para este componente:
                     Neste caso, uma codificação html necessária --}}
                    <p>Analizaremos a sua mensagem o mais breve possível.</p>
                    <p>Responderemos em até 48hs</p>
                @endcomponent

            </div>
        </div>
    </div>



    <div class="rodape">
        <div class="redes-sociais">
            <h2>Redes sociais</h2>
            <img src="{{ asset('img/facebook.png') }}">
            <img src="{{ asset('img/linkedin.png') }}">
            <img src="{{ asset('img/youtube.png') }}">
        </div>
        <div class="area-contato">
            <h2>Contato</h2>
            <span>(11) 3333-4444</span>
            <br>
            <span>supergestao@dominio.com.br</span>
        </div>
        <div class="localizacao">
            <h2>Localização</h2>
            <img src="{{ asset('img/mapa.png') }}">
        </div>
    </div>
@endsection
