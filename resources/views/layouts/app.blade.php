<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Aplicativo</title>
    <!-- Adicione seus estilos CSS aqui -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav>
        <!-- Adicione sua barra de navegação aqui -->
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <footer>
        <!-- Adicione seu rodapé aqui -->
    </footer>

    <!-- Adicione seus scripts JavaScript aqui -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>