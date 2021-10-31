@if (count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem alguns forneceodres cadastrados</h3>
@elseif(count($fornecedores) > 10)
    <h3>Existem vários forneceodres cadastrados</h3>
@else
    <h3>Ainda não existem forneceodres cadastrados</h3>
@endif





