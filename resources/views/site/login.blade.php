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
            <h1>Login</h1>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form action={{ route('site.login') }} method="POST">
                    @csrf
                    <input name="usuario" type="text" placeholder="Usuário" class="borda-preta">
                    <input name="senha" type="password" placeholder="Senha" class="borda-preta">
                    <button type="submit" class="borda-preta">Acessar</button>
                </form>
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
