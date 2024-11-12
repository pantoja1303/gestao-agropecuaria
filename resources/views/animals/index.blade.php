<x-layout title="Animais">
    <div class="d-flex justify-content-start mb-2">
        <a href="{{ route('animals.create') }}">
            <img src="{{ asset('images/registro.png') }}" alt="Cadastrar Novo Animal" title="Cadastrar Novo Animal" width="40" height="40">
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Brinco</th>
                <th scope="col">Status</th>
                <th scope="col">Tipo</th>
                <th scope="col">Raça</th>
                <th scope="col">Origem</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($animals as $animal)
            <tr>
                <td>{{ $animal->id }}</td>
                <td>{{ $animal->ear_tag_number }}</td>
                <td>{{ $animal->status_description }}</td>
                <td>{{ $animal->type_description }}</td>
                <td>{{ $animal->breed_description }}</td>
                <td>{{ $animal->origin_description }}</td>
                <td>
                    <a href="{{ route('animals.show', $animal->id) }}" class="mr-2">
                        <img src="{{ asset('images/editar.png') }}" alt="Editar" title="Editar" width="30" height="30">
                    </a>
                    <form action="{{ route('animals.destroy', $animal->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background:none; border:none; padding:0; margin-left:15px;" onclick="return confirm('Tem certeza que deseja excluir este animal?')">
                            <img src="{{ asset('images/excluir.png') }}" alt="Excluir" title="Excluir" width="30" height="30">
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>