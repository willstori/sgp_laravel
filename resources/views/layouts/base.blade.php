<!doctype html>
<html lang="pt-br">

<head>
    @include('includes.head')
    <title>@yield('titulo') - SGP Laravel</title>
</head>

<body>
    <!-- Header -->
    @include('includes.header')
    <!-- Fim Header -->

    <!-- Corpo da Página -->
    <div class="container">

        <h1 class="mt-4">@yield('titulo')</h1>
        <p>@yield('descricao_pagina')</p>

        @yield('conteudo')

    </div>
    <!-- Fim Corpo da Página -->

    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Scripts -->
    @yield('scripts')
    <!-- Fim Scripts -->

</body>

</html>
