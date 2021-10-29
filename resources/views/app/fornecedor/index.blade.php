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

{{-- Assim o blade não suporta a impressão desta variável,
     por ser do tipo array: --}}
     {{-- {{ $fornecedores }} --}}

{{-- Assim será suportado(impresso) pelo blade: --}}
{{-- @dd($fornecedores) --}}

@if (count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem alguns forneceodres cadastrados</h3>
@elseif(count($fornecedores) > 10)
    <h3>Existem vários forneceodres cadastrados</h3>
@else
    <h3>Ainda não existem forneceodres cadastrados</h3>
@endif

