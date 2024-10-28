<x-simple title="Pesagens">
    <a href="{{ route('animals.weighings.create', $animal->id) }}" class="btn btn-primary mb-3" onclick="openPopup(this.href); return false;">Registrar Nova Pesagem</a>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Data</th>
                <th scope="col">Peso</th>
            </tr>
        </thead>
        <tbody>
            @foreach($weighings as $weighing)
                <tr onclick="openPopup('{{ route('animals.weighings.edit', ['animal' => $animal->id, 'weighing' => $weighing->id]) }}')" style="cursor: pointer;">
                    <td>{{ \Carbon\Carbon::parse($weighing->weighing_date)->format('d/m/Y') }}</td>
                    <td>{{ $weighing->weight }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-simple>
