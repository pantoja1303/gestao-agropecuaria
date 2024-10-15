<x-layout title="Animais">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h1 class="mb-0">Cadastrar Novo Animal</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('animals.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nome">Brinco</label>
                            <input type="number" name="ear_tag_number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="especie">Raça</label>
                            <input type="number" name="id_breed" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="tipo">Tipo do Animal</label>
                            <input type="number" name="type_of_animal" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="origem">Origem</label>
                            <input type="number" name="origin" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="data_compra">Data de Compra</label>
                            <input type="date" name="purchase_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="data_nascimento">Data de Nascimento</label>
                            <input type="date" name="birth_date" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<style>
    .card {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .form-group {
        margin-bottom: 20px;
    }
</style>
</x-layout>