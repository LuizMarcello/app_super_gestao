<h3>Fornecedor</h3>

@php
/*
  if(empty($variavel)) {} //Retorna true se a variável estiver vazia
  Para uma variável php  estar vazia:
  - '' - String vazia
  - 0 - Inteiro zero
  - 0.0 - Ponto flutuante só com zero
  - '0' - String com zero
  - null - Nulo
  - false
  - array () - array vazio
  - $var - Só declarada, sem atribuir valor
*/
@endphp

@isset($fornecedores)
    Fornecedor: {{ $fornecedores[0]['nome'] }}
    <br>
    Status: {{ $fornecedores[0]['status'] }}
    <br>
    @empty($fornecedores[0]['cnpj'])
        - Vazia
    @endempty
    <br>
    CNPJ: {{ $fornecedores[0]['cnpj'] }}

    <br>
    <br>
    Fornecedor: {{ $fornecedores[1]['nome'] }}
    <br>
    Status: {{ $fornecedores[1]['status'] }}
    <br><br>
    @isset($fornecedores[1]['cnpj'])
        Status: {{ $fornecedores[1]['cnpj'] }}
    @endisset
@endisset
