<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}} - Gestão Agropecuária</title>
    @vite([
        'resources/js/app.js',
        'resources/css/app.scss',
        'resources/js/layouts/medication.js'
    ])
    <style>
/  /* Estilo para o botão com imagem e texto */
        .nav-link.button-with-icon {
            display: flex;
            align-items: center;
            padding: 8px 12px;
            color: #fff;
            background-color: #007bff; /* Ajuste a cor conforme necessário */
            border-radius: 4px;
            text-decoration: none;
        }

        .nav-link.button-with-icon img {
            width: 24px; /* Ajuste o tamanho da imagem conforme necessário */
            height: auto;
            margin-right: 8px; /* Espaço entre a imagem e o texto */
        }

        .nav-link.button-with-icon:hover {
            background-color: #0056b3; /* Cor de fundo ao passar o mouse */
        }
</style>
</head> 
<body>
    <!-- Menu lateral -->
    <nav class="sidebar navbar-light bg-light backgroud_navbar">
        <div class="container-fluid">
            <ul class="navbar-nav flex-column">
                <li class="nav-item">
                    <a class="nav-link button-with-icon" href="{{ route('dashboard.index') }}">
                        <img src="{{ asset('images/touro.png') }}" alt="Touro">
                        Gestão Agropecuária
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link button-with-icon" href="{{ route('animals.index') }}">
                        <img src="{{ asset('images/silhueta-de-vaca.png') }}" alt="Silhueta de Vaca">
                        Cadastro de Animais
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link button-with-icon" href="{{ route('medications.index') }}">
                        <img src="{{ asset('images/vacina.png') }}" alt="Vacina">
                        Medicamento
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link button-with-icon" href="#">
                        <img src="{{ asset('images/inseminacao.png') }}" alt="Inseminação">
                        Inseminação
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <!-- Botão de Logout -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-link button-with-icon">
                            <img src="{{ asset('images/sair-do-usuario.png') }}" alt="Sair">
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>   
    <!-- Conteúdo Principal -->
    <div class="content">
        <div class="container mt-6">
            <h1>{{$title}}</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{$slot}}
        </div>
    </div>
</body>
</html>

<script>
// Script para fazer as linhas clicáveis
document.addEventListener('DOMContentLoaded', function () {
    var rows = document.querySelectorAll('.clickable-row');
    rows.forEach(function(row) {
        row.addEventListener('click', function() {
            window.open(row.dataset.href, '_blank', 'width=800,height=600');
        });
    });
    });
    
</script>