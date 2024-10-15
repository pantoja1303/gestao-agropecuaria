<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}} - Gestão Agropecuária</title>
    @vite('resources/css/app.scss')
</head> 
<body>
    <div class="container mt-5">
        <h1>{{$title}}</h1>
        {{$slot}}
    </div>
</body>
</html>