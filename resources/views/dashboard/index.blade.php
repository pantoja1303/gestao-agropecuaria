<x-layout title="">
    @section('content')
    <div class="container">
        <h1>Sistema de Gestão Agropecuária</h1>
        <div class="row mt-4">
            <!-- Total Cadastrados -->
            <div class="col-md-6 mb-4">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <h4>Total Cadastrados</h4>
                        <p class="display-4">{{ $totalCadastrado }}</p>
                    </div>
                </div>
            </div>
            <!-- Total Ativos -->
            <div class="col-md-6 mb-4">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h4>Total Ativos</h4>
                        <p class="display-4">{{ $totalAtivo }}</p>
                    </div>
                </div>
            </div>
            <!-- Total Mortos -->
            <div class="col-md-6 mb-4">
                <div class="card bg-danger text-white">
                    <div class="card-body">
                        <h4>Total Mortos</h4>
                        <p class="display-4">{{ $totalMorto }}</p>
                    </div>
                </div>
            </div>
            <!-- Total Vendidos -->
            <div class="col-md-6 mb-4">
                <div class="card bg-warning text-white">
                    <div class="card-body">
                        <h4>Total Vendidos</h4>
                        <p class="display-4">{{ $totalVendido }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>