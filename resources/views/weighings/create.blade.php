<x-simple title="Registrar Pesagem">
    <form id="weighing-form" action="{{ route('animals.weighings.store', $animal->id) }}" method="POST">
        @csrf
        <div class="row">
            <div class="col">
                <label for="weighing_date" class="form-label">Data da Pesagem</label>
                <input type="date" name="weighing_date" class="form-control" required>
            </div>
            <div class="col">
                <label for="weight" class="form-label">Peso</label>
                <input type="number" step="0.01" name="weight" class="form-control" required>
            </div>
        </div>
        <div class="text-end mt-2">
            <button type="submit" class="btn btn-success">Gravar</button>
        </div>
    </form>
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