<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel - Teste</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body class="antialiased">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Teste</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('colaboradores.index') }}">Relatório de Colaboradores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('colaboradores.ranking') }}">Ranking de Colaboradores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('colaboradores.create') }}">Criar Colaborador</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('unidades.index') }}">Listar Unidades</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('unidades.create') }}">Criar Unidade</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="d-flex-column justify-content-center">
                {{ $slot }}
            </div>
        </div>
        @stack('scripts')
    </body>
</html>
