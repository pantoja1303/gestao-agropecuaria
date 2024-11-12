<x-simple title="Registrar Pesagem">
    <form id="weighing-form" action="{{ $action }}" method="POST">
        @csrf
        @isset($weighing->id)
            @method('PUT')
        @endisset
        <div class="row">
            <div class="col">
                <label for="weighing_date" class="form-label">Data da Pesagem</label>
                <input 
                    type="date" 
                    name="weighing_date" 
                    class="form-control" required
                    value ="{{ old('weighing_date', isset($weighing->weighing_date) ? $weighing->weighing_date : '') }}">
            </div>
            <div class="col">
                <label for="weight" class="form-label">Peso</label>
                <input 
                    type="number" 
                    step="0.01" 
                    name="weight" 
                    class="form-control" required
                    value ="{{ old('weight', isset($weighing->weight) ? $weighing->weight : '') }}">
            </div>
        </div>
        <div class="text-end mt-2">
            <button type="submit" class="btn mt-3">
                <img src="{{ asset('images/gravar.png') }}" alt="Gravar" width="30" height="30">
                Gravar
            </button>
            @isset($weighing->id)
                <button class="btn mt-3" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                    <img src="{{ asset('images/excluir.png') }}" alt="Excluir" width="30" height="30">
                    Excluir
                </button>
            @endisset
        </div>
    </form>
    @isset($weighing->id)
        <form id="delete-form" action="{{ route('animals.weighings.update', ['animal' => $animal->id, 'weighing' => $weighing->id]) }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    @endisset
</x-simple>

<script>
    document.getElementById('weighing-form').addEventListener('submit', function(e) {
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