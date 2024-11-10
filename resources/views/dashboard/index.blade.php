<x-layout title="">
@section('content')
<div class="container">
    <h1>Sistema de Gestão Agropecuária</h1>
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4>Total de Gados Cadastrados</h4>
                    <p class="display-4">{{ $totalCadastrado }}</p>
                </div>
            </div>
        </div>
        <!-- Aqui você pode adicionar mais cards com outras estatísticas se desejar -->
    </div>
</div>
</x-layout>