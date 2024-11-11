<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}} - Gestão Agropecuária</title>
    @vite(['resources/js/app.js', 'resources/css/app.scss'])
</head> 
<body>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                        @if ($errors->any())
                    <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                </div>
            @endif
                <form action="{{ $action }}" method="POST">
                    @csrf
                    @isset($medication->id)
                    @method('PUT')
                    @endisset
                    <div class="row">
                        <div class="col">
                            <label for="animal_id">Brinco*</label>
                            <select 
                                name="animal_id" 
                                id="animal_id" 
                                class="form-control" required>
                                <option value="">Selecione um brinco</option>
                                    @foreach ($animals as $animal)
                                        <option value="{{ $animal->id }}" 
                                            {{ old('animal_id', isset($medication->animal_id) ? $medication->animal_id : '') == $animal->id ? 'selected' : '' }}>
                                            {{ $animal->ear_tag_number }}
                                        </option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="administration_date">Data Adm*</label>
                            <input 
                                type="date" 
                                name="administration_date" 
                                class="form-control" required 
                                value ="{{ old('administration_date', isset($medication->administration_date) ? $medication->administration_date : '') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="quantity">Quantidade*</label>
                            <input 
                                type="number" 
                                name="quantity" 
                                class="form-control" required 
                                value ="{{ old('quantity', isset($medication->quantity) ? $medication->quantity : '') }}">
                        </div>
                        <div class="col">
                            <label for="unit">Unidade*</label>
                            <input 
                                type="string" 
                                name="unit" 
                                class="form-control" required 
                                value ="{{ old('unit', isset($medication->unit) ? $medication->unit : '') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="drug_id">Medicamento*</label>
                            <select 
                                name="drug_id" 
                                id="drug_id" 
                                class="form-control" required>
                                <option value="">Selecione um Medicamento</option>
                                    @foreach ($drugs as $drug)
                                        <option value="{{ $drug->id }}" 
                                            {{ old('drug_id', isset($medication->drug_id) ? $medication->drug_id : '') == $drug->id ? 'selected' : '' }}>
                                            {{ $drug->description }}
                                        </option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="status_medication_id">Status*</label>
                            <select 
                                name="status_medication_id" 
                                id="status_medication_id" 
                                class="form-control" required>
                                <option value="">Selecione um Status</option>
                                    @foreach ($statusMedications as $statusMedication)
                                        <option value="{{ $drug->id }}" 
                                            {{ old('status_medication_id', isset($medication->status_medication_id) ? $medication->status_medication_id : '') == $statusMedication->id ? 'selected' : '' }}>
                                            {{ $statusMedication->description }}
                                        </option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="observation">Observação</label>
                            <input 
                                type="text" 
                                name="observation" 
                                class="form-control"
                                value ="{{ old('unit', isset($medication->observation) ? $medication->observation : '') }}">
                        </div>
                    </div>

                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-primary btn-block mt-3">Gravar</button>
                    @isset($medication->id)
                        <button class="btn btn-danger mt-3" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">Excluir </button>
                    @endisset
                    </div>
                </form>
                @isset($medication->id)
                <form id="delete-form" action="{{ route('medications.destroy', $medication->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
                @endisset
            </div>
        </div>
    </div>
</div>
</body>
</html>

<script>
    document.getElementById('medication-form').addEventListener('submit', function(e) {
        e.preventDefault(); // Previne o envio tradicional do formulário

        const form = this;
        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.opener.location.reload(); // Atualiza a janela principal
                window.close(); // Fecha a janela popup
            } else {
                alert('Erro ao gravar a pesagem.');
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Erro ao processar o formulário.');
        });
    });
</script>