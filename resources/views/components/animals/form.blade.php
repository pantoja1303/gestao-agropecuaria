<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}} - Gestão Agropecuária</title>
    @vite(['resources/js/app.js', 'resources/css/app.scss'])
</head> 
<body>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
            @if ($errors->any())
                    <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                </div>
            @endif
                <form action="{{ $action }}" method="POST">
                    @csrf
                    @isset($animal->id)
                    @method('PUT')
                    @endisset
                    <div class="row">
                        <div class="col">
                            <label for="ear_tag_number">Nº Brinco*</label>
                            <input 
                                type="number" 
                                name="ear_tag_number" 
                                class="form-control" required 
                                value ="{{ old('ear_tag_number', isset($animal->ear_tag_number) ? $animal->ear_tag_number : '') }}">
                        </div>
                        <div class="col">
                            <label for="status_id">Status*</label>
                            <select 
                                name="status_id" 
                                id="status_id" 
                                class="form-control" required>
                                <option value="">Selecione um status</option>
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status->id }}" 
                                            {{ old('status_id', isset($animal->status_id) ? $animal->status_id : '') == $status->id ? 'selected' : '' }}>
                                            {{ $status->description }}
                                        </option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="breed">Raça*</label>
                            <select name="breed_id" id="breed_id" class="form-control" required>
                                <option value="">Selecione uma raça</option>
                                @foreach ($breeds as $breed)
                                    <option value="{{ $breed->id }}"
                                        {{ old('breed_id', isset($animal->breed_id) ? $animal->breed_id : '') == $breed->id ? 'selected' : '' }}>
                                        {{ $breed->description }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="type">Tipo do Animal*</label>
                            <select name="type_id" id="type_id" class="form-control" required>
                                <option value="">Selecione um tipo</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}" 
                                        {{ old('type_id', isset($animal->type_id) ? $animal->type_id : '') == $type->id ? 'selected' : '' }}>
                                        {{ $type->description }}
                                    </option>
                                @endforeach
                            </select>
                        </div>                       
                        <div class="col">
                            <label for="origin_id">Origem*</label>
                            <select 
                                name="origin_id" 
                                id="origin_id" 
                                class="form-control" required
                                @isset($animal->origin_id)value="{{$animal->origin_id}}"@endisset>
                                <option value="">Selecione uma origem</option>
                                    @foreach ($origins as $origin)
                                        <option value="{{ $origin->id }}" 
                                            {{ old('origin_id', isset($animal->origin_id) ? $animal->origin_id : '') == $origin->id ? 'selected' : '' }}>
                                            {{ $origin->description }}
                                        </option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="data_compra">Data de Compra</label>
                            <input 
                                type="date" 
                                name="purchase_date" 
                                class="form-control"
                                value ="{{ old('purchase_date', isset($animal->purchase_date) ? $animal->purchase_date : '') }}">
                        </div>
                        <div class="col">
                            <label for="data_nascimento">Data de Nascimento*</label>
                            <input 
                                type="date" 
                                name="birth_date" 
                                class="form-control" required
                                value ="{{ old('birth_date', isset($animal->birth_date) ? $animal->birth_date : '') }}">
                        </div>
                    </div>
                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-primary btn-block mt-3">Gravar</button>
                    @isset($animal->id)
                        <button class="btn btn-danger mt-3" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">Excluir </button>
                    @endisset
                    </div>
                </form>
                @isset($animal->id)
                <form id="delete-form" action="{{ route('animals.destroy', $animal->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
                @endisset
            </div>
        </div>
    </div>
</div>
</body>
</html>