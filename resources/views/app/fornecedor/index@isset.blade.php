<h3>Fornecedor</h3>

@php
/*
    if(isset($variavel)) {} //Retornar true se a variável estiver definida
    */
@endphp

@isset($fornecedores)
    Fornecedor: {{ $fornecedores[0]['nome'] }}
    <br>
    Status: {{ $fornecedores[0]['status'] }}
    <br>
    Status: {{ $fornecedores[0]['cnpj'] }}

    <br>

    Fornecedor: {{ $fornecedores[1]['nome'] }}
    <br>
    Status: {{ $fornecedores[1]['status'] }}
    <br><br>
    @isset($fornecedores[1]['cnpj'])
        Status: {{ $fornecedores[1]['cnpj'] }}
    @endisset

@endisset
