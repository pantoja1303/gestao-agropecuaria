<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - Gestão Agropecuária</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/js/app.js', 'resources/css/app.scss'])
</head> 
<body>
    <h1>{{ $title }}</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{ $slot }}

    <!-- Script agora está dentro do body e após o conteúdo principal -->
    <script>
        console.log("Script carregado"); // Verificação de carregamento do script

        function openPopup(url) {
            window.open(url, 'popup', 'width=400,height=200');
        }

        // Script para associar o evento de clique após o carregamento do DOM
        document.addEventListener('DOMContentLoaded', function () {
            var rows = document.querySelectorAll('.clickable-row');
            rows.forEach(function(row) {
                row.addEventListener('click', function() {
                    openPopup(row.dataset.href); // Abre a URL no popup
                });
            });
        });
    </script>
</body>
</html>