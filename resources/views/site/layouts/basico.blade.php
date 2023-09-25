<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Super Gestão @yield('titulo')</title>
    <link rel="stylesheet" href="{{ asset('css/estilo_basico.css') }}">
</head>
<body>
    @include('site.layouts._partials.topo')
    @yield('conteudo')
</body>
</html>