@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Animal</h1>
    <form action="{{ route('animals.update', $animal->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ $animal->nome }}" required>
        </div>
        <div class="form-group">
            <label for="especie">Espécie</label>
            <input type="text" name="especie" class="form-control" value="{{ $animal->especie }}" required>
        </div>
        <div class="form-group">
            <label for="idade">Idade</label>
            <input type="number" name="idade" class="form-control" value="{{ $animal->idade }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection