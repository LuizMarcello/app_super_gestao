{{-- Este é um "template" --}}
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Super Gestão - @yield('titulo')</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/estilo_basico.css') }}">
</head>

<body>
    {{-- Incluindo aqui neste ponto, a partial view "topo.blade.php" --}}
    @include('app.layouts._partialsViews.topo')

    {{-- Indica, aqui no template extendido, onde os blocos html
         das "sections" das views, devem ser reinderizados --}}
    @yield('conteudo')
</body>

</html>
