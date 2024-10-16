<x-layout title="Animais">
    <a href="{{ route('animals.create') }}" class="btn btn-primary mb-3">Cadastrar Novo Animal</a>
    <table class="table table-secondary">
        <thead>
            <tr class="table-dark">
                <th scope="col">Brinco</th>
                <th scope="col">Tipo</th>
                <th scope="col">Raça</th>
                <th scope="col">Origem</th>
                <th scope="col"> </th>
            </tr>
        </thead>
        <tbody>
            @foreach($animals as $animal)
            <tr>
                <td>{{ $animal->ear_tag_number }}</td>
                <td>{{ $animal->animal_type_description }}</td>
                <td>{{ $animal->animal_breed_description }}</td>
                <td>{{ $animal->origin_description }}</td>
                <td>    
                    <a href="{{ route('animals.edit', $animal->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('animals.destroy', $animal->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>