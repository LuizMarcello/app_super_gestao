<h3>Fornecedor</h3>

@php
/*
  Condições que será usado o valor default:
  $variavel testada não estiver definida(existir)(depende do isset)
  ou
  $variável testada possuir o valor "null"
*/
@endphp

@isset($fornecedores)
    Fornecedor: {{ $fornecedores[0]['nome'] }}
    <br>
    Status: {{ $fornecedores[0]['status'] }}
    <br>
    CNPJ: {{ $fornecedores[0]['cnpj'] ?? 'Dado não foi preenchido.'}}
@endisset
