<x-layout title="Animais">
    <a href="{{ route('medications.create') }}" class="btn btn-primary mb-3">Cadastrar Medicação</a>
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
                <th scope="col">Data Adm</th>
                <th scope="col">Medicação</th>
                <th scope="col">Classificação</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Un</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($medications as $medication)
            <tr class="clickable-row" data-href="{{ route('medications.edit', $medication->id) }}">
                <td>{{ $medication->id }}</td>
                <td>{{ $medication->ear_tag_number }}</td>
                <td>{{ $medication->administration_date }}</td>
                <td>{{ $medication->drug_description }}</td>
                <td>{{ $medication->drug_classification_description }}</td>
                <td>{{ $medication->quantity }}</td>
                <td>{{ $medication->unit }}</td>
                <td>{{ $medication->status_medication_description }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>


