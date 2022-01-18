<div class="topo">
    <div class="logo">
        {{-- Helper "asset()" do laravel:
                 Modo relativo(normal) não é muito bom.
                 Para incluir "assets" (midias dentro das views), melhor usar o helper
                 "assets()". Usará uma string com a referência da imagem.
                 Ele olhará sempre para a pasta "public" do laravel, mas é
                 possível configurar este caminho. --}}
        {{-- <img src="img/logo.png"> --}}
        <img src="{{ asset('img/logo.png') }}">
    </div>

    <div class="menu">
        <ul>
            {{-- Helper "route()" do laravel --}}
            <li><a href="{{ route('app.home') }}">Home</a></li>
            <li><a href="{{ route('app.cliente') }}">Cliente</a></li>
            <li><a href="{{ route('app.fornecedor') }}">Fornecedor</a></li>
            <li><a href="{{ route('produto.index') }}">Produto</a></li>
            <li><a href="{{ route('app.sair') }}">Sair</a></li>
        </ul>
    </div>
</div>
