<h3>Fornecedor</h3>

{{-- Obs: Fora do "bloco php blade" --}}
{{-- Aqui fica o comentário que será descartado pelo interpretador do blade --}}
{{-- A tag curta de impressão do php(<?= ?>) e {{ }} do blade são sinônimos --}}

{{-- Incluindo blocos php puros no blade: --}}
@php
/* Obs: Dentro do "bloco php blade" */
    //Para comentários php de uma linha
    /*
      Para cometnários php de múltiplas linhas
    */
    /* echo 'Texto de teste'; */

    /* Normalmente no php: */
    /*
     if() {

    } elseif () {
        # code...
    } else {

    }
    */
@endphp

{{-- Assim o blade não suporta a impressão desta
     variável, por ser do tipo array: --}}
     {{-- {{ $fornecedores }} --}}

{{-- Assim será suportado(impresso) pelo blade: --}}
{{-- @dd($fornecedores) --}}

@php
/*
if (!<condicao>)() - Enquanto executa se o retorno por "true"
*/
@endphp

{{-- @unless - executa se o retorno for "false" --}}

{{-- @dd($fornecedores); --}}

Fornecedor: {{ $fornecedores[0]['nome']}}
<br>
Status: {{ $fornecedores[0]['status']}}
<br>

{{-- Usando o "if" --}}
@if (!($fornecedores[0]['status'] == 'S')) {{-- Executa se o retorno da condição for "false" --}}
    Fornecedor inativo
@endif
<br>

{{-- Usando o @unless --}}
@unless ($fornecedores[0]['status'] == 'S') {{-- Executa se o retorno da condição for "false" --}}
    Fornecedor inativo
@endunless







