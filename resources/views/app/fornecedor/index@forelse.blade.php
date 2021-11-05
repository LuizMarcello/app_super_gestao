<h3>Fornecedor</h3>

@php
/*

*/
@endphp

@isset($fornecedores)

    {{-- @forelse ($fornecedores as $indice => $fornecedor) --}}
    {{-- ou assim: --}}
    @forelse ($fornecedores as $fornecedor)
        Fornecedor: {{ $fornecedor['nome'] }}
        <br>
        Status: {{ $fornecedor['status'] }}
        <br>
        CNPJ: {{ $fornecedor['cnpj'] ?? '' }}
        <br>
        Telefone: ({{ $fornecedor['ddd'] ?? '' }}) ({{ $fornecedor['telefone' ?? ''] }})
        <hr>
    @empty
        {{-- Se o array "$fornecedores" estiver vazio, o fluxo será desviado para cá --}}
        Não existem fornecedores cadastrados.
    @endforelse

@endisset
