<x-layout title="Animais">
    <a href="{{ route('animals.create') }}" class="btn btn-primary mb-3">Cadastrar Novo Animal</a>
     @if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
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
            </tr>
        </thead>
        <tbody>
            @foreach($animals as $animal)
            <tr class="clickable-row" data-href="{{ route('animals.show', $animal->id) }}">
                <td>{{ $animal->id }}</td>
                <td>{{ $animal->ear_tag_number }}</td>
                <td>{{ $animal->status_description }}</td>
                <td>{{ $animal->type_description }}</td>
                <td>{{ $animal->breed_description }}</td>
                <td>{{ $animal->origin_description }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
