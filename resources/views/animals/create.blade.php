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
                        <div class="form-group">
                            <label for="breed">Raça</label>
                            <select name="breed_id" id="breed_id" class="form-control">
                                <option value="">Selecione uma raça</option>
                                @foreach ($breeds as $breed)
                                    <option value="{{ $breed->id }}">{{ $breed->description }}</option>
                                @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                            <label for="type">Tipo do Animal</label>
                            <select name="type_id" id="type_id" class="form-control">
                                <option value="">Selecione um tipo</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->description }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                             <label for="origin_id">Origem</label>
                            <select name="origin_id" id="origin_id" class="form-control">
                                <option value="">Selecione uma origem</option>
                                @foreach ($origins as $origin)
                                    <option value="{{ $origin->id }}">{{ $origin->description }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="data_compra">Data de Compra</label>
                            <input type="date" name="purchase_date" class="form-control">
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