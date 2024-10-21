<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h1 class="mb-0">{{$title}}</h1>
            </div>
            <div class="card-body">
                <form action="{{ $action }}" method="POST">
                    @csrf
                    @isset($animal->id)
                    @method('PUT')
                    @endisset
                    <div class="row">
                        <div class="col">
                            <label for="ear_tag_number">Brinco</label>
                            <input 
                                type="number" 
                                name="ear_tag_number" 
                                class="form-control" required 
                                @isset($animal->ear_tag_number)value="{{$animal->ear_tag_number}}"@endisset>
                        </div>
                        <div class="col">
                            <label for="breed">Raça</label>
                            <select name="breed_id" id="breed_id" class="form-control" required>
                                <option value="">Selecione uma raça</option>
                                @foreach ($breeds as $breed)
                                    <option value="{{ $breed->id }}"
                                        {{ isset($animal->breed_id) && $animal->breed_id == $breed->id ? 'selected' : '' }}>
                                        {{ $breed->description }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="type">Tipo do Animal</label>
                            <select name="type_id" id="type_id" class="form-control" required>
                                <option value="">Selecione um tipo</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}" 
                                        {{ isset($animal->type_id) && $animal->type_id == $type->id ? 'selected' : '' }}>
                                        {{ $type->description }}
                                    </option>
                                @endforeach
                            </select>
                        </div>                       
                        <div class="col">
                            <label for="origin_id">Origem</label>
                            <select 
                                name="origin_id" 
                                id="origin_id" 
                                class="form-control" required
                                @isset($animal->origin_id)value="{{$animal->origin_id}}"@endisset>
                                <option value="">Selecione uma origem</option>
                                    @foreach ($origins as $origin)
                                        <option value="{{ $origin->id }}" 
                                            {{ isset($animal->origin_id) && $animal->origin_id == $origin->id ? 'selected' : '' }}>
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
                                @isset($animal->purchase_date)value="{{$animal->purchase_date}}"@endisset>
                        </div>
                        <div class="col">
                            <label for="data_nascimento">Data de Nascimento</label>
                            <input 
                                type="date" 
                                name="birth_date" 
                                class="form-control" required
                                @isset($animal->birth_date)value="{{$animal->birth_date}}"@endisset>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary btn-block mt-3">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>