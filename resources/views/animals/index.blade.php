<!-- resources/views/animals/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Animais</h1>
    <a href="{{ route('animals.create') }}" class="btn btn-primary">Cadastrar Novo Animal</a>
    <table class="table">
        <thead>
            <tr>
                <th>Brinco</th>
                <th>Tipo</th>
                <th>Raça</th>
                <th>Origem</th>
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
</div>
@endsection