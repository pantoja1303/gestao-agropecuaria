<x-weighing.layout title="Editar Pesagem do Animal: {{ $animal->ear_tag_number }}">
    <form action="{{ route('animals.weighings.update', [$animal->id, $weighing->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="weighing_date">Data da Pesagem</label>
            <input type="date" name="weighing_date" class="form-control" value="{{ $weighing->weighing_date }}" required>
        </div>
        <div class="form-group">
            <label for="weight">Peso (kg)</label>
            <input type="number" name="weight" step="0.01" class="form-control" value="{{ $weighing->weight }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
</x-weighing.layout>