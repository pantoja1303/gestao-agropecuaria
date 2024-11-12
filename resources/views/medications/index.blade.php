<x-layout title="Medicações">
    <div class="d-flex justify-content-start mb-2">
        <a href="{{ route('medications.create') }}">
            <img src="{{ asset('images/registro.png') }}" alt="Cadastrar Medicação" title="Cadastrar Medicação" width="40" height="40">
        </a>
    </div>
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
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($medications as $medication)
            <tr>
                <td>{{ $medication->id }}</td>
                <td>{{ $medication->ear_tag_number }}</td>
                <td>{{ \Carbon\Carbon::parse($medication->administration_date)->format('d/m/Y') }}</td>
                <td>{{ $medication->drug_description }}</td>
                <td>{{ $medication->drug_classification_description }}</td>
                <td>{{ $medication->quantity }}</td>
                <td>{{ $medication->unit }}</td>
                <td>{{ $medication->status_medication_description }}</td>
                <td>
                    <a href="{{ route('medications.edit', $medication->id) }}" class="mr-2">
                        <img src="{{ asset('images/editar.png') }}" alt="Editar" title="Editar" width="30" height="30">
                    </a>
                    <form action="{{ route('medications.destroy', $medication->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background:none; border:none; padding:0; margin-left:15px;" onclick="return confirm('Tem certeza que deseja excluir?')">
                            <img src="{{ asset('images/excluir.png') }}" alt="Excluir" title="Excluir" width="30" height="30">
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>


