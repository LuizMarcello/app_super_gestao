<h3>Fornecedor</h3>

@php
/*

*/
@endphp

{{-- o objeto "loop" está disponivel sómente para os laços "foreach" e "forelse". --}}
{{-- Atributos loop: iteration, first, last, count --}}


@isset($fornecedores)

    {{-- @forelse ($fornecedores as $indice => $fornecedor) --}}
    {{-- ou assim: --}}
    @forelse ($fornecedores as $fornecedor)
        {{-- Mais detalhes sobre o objeto "loop", variáveis, objetos, dentro das
             views, e principais atributos: --}}
       {{--  @dd($loop) --}}
        Iteração atual: {{ $loop->iteration }}
        <br>
        Fornecedor: {{ $fornecedor['nome'] }}
        <br>
        Status: {{ $fornecedor['status'] }}
        <br>
        CNPJ: {{ $fornecedor['cnpj'] ?? '' }}
        <br>
        Telefone: ({{ $fornecedor['ddd'] ?? '' }}) ({{ $fornecedor['telefone' ?? ''] }})
        <br>
        @if ($loop->first)
            Primeira iteração do loop
        @endif

        @if ($loop->last)
            Última iteração do looop
            <br>
            {{-- Total de registros no array que está sendo percorrido --}}
            Total de registros: {{ $loop->count}}
        @endif
        <hr>
    @empty
        {{-- Se o array "$fornecedores" estiver vazio, o fluxo será desviado para cá --}}
        Não existem fornecedores cadastrados.
    @endforelse

@endisset
