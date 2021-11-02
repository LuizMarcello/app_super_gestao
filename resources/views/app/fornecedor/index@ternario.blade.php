<h3>Fornecedor</h3>

@php
/*
condição ? se verdade : se falso
condição ? se verdade : (condição ? se verdade : se falso) - Encadeamento
*/
@endphp

@isset($fornecedores)
    @php
        $msg1 = isset($fornecedores[1]['cnpj']) ? 'CNPJ informado' : 'CNPJ não informado';

        $msg0 = isset($fornecedores[0]['cnpj']) ? 'CNPJ informado' : 'CNPJ não informado';

        echo $msg1; 
        echo $msg0;
    @endphp
@endisset
