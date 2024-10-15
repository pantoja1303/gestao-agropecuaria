<x-layout title="Animais">
    <a href="{{ route('animals.create') }}" class="btn btn-primary mb-3">Cadastrar Novo Animal</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Brinco</th>
                <th scope="col">Tipo</th>
                <th scope="col">Raça</th>
                <th scope="col">Origem</th>
            </tr>
        </thead>
        <tbody>
            @foreach($animals as $animal)
            <tr>
                <td>{{ $animal->ear_tag_number }}</td>
                <td>{{ $animal->type_of_animal }}</td>
                <td>{{ $animal->id_breed }}</td>
                <td>{{ $animal->origin }}</td>
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