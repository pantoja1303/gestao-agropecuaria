<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}} - Gestão Agropecuária</title>
    @vite(['resources/js/app.js', 'resources/css/app.scss'])
    <script src="{{ asset('js/app.js') }}"></script>
</head> 
<body>
    <!-- Menu lateral -->
  <nav class="sidebar navbar-light bg-light backgroud_navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Gestão Agropecuária</a>
            <ul class="navbar-nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="#">Cadastro de Animais</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Medicamento</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Inseminação</a>
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