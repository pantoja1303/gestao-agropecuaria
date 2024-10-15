<form action="{{$action}}" method="POST">
    @csrf
    @isset($id)
    @method('PUT')
    @endisset
    <div class="mb-3">
        <label for="nome" class="form-label">Nome:</label>
        <input 
            type="text" 
            id="nome" 
            name="nome" 
            class="form-control" 
            @isset($nome) value="{{$nome}}"@endisset>
    </div>
        <div class="mb-3">
        <label for="ear_tag_number" class="form-label">Número Brinco:</label>
        <input 
            type="text" 
            id="ear_tag_number" 
            name="ear_tag_number" 
            class="form-control" 
            @isset($ear_tag_number) value="{{$ear_tag_number}}"@endisset>
    </div>
    </div>
        <div class="mb-3">
            <label for="origin" class="form-label">Origem</label>
                <select id="origin" name="origin" class="form-select">
                <option value="">Selecione</option>
                    @foreach(App\Models\Origin::all() as $origin)
                        <option value="{{ $origin->id }}" {{ old('origin', $animal->origin) == $origin->id ? 'selected' : '' }}>
                    {{ $origin->description }}
                </option>
                    @endforeach
    </select>
    </div>
</div>

    <button type="submit" class="btn btn-primary">Adicionar</button>
</form>
