<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <ul class="nav nav-tabs" id="animalTabs">
                <li class="nav-item">
                    @if (@isset($animal->id))
                        <a class="nav-link active" data-tab="cadastro" href="{{ route('animals.edit', $animal->id) }}">Cadastro</a>
                    @else
                        <a class="nav-link" data-tab="cadastro" href="{{ route('animals.create') }}">Cadastro</a>
                    @endif
                </li>
                @isset($animal->id)
                    <li class="nav-item">
                        <a class="nav-link" data-tab="pesagens" href="{{ route('animals.weighings.index', $animal->id) }}">Pesagens</a>
                    </li>
                @endisset
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Reprodução</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Sanidade</a>
                </li>
            </ul>

            <div class="card-body">
                <!-- Aqui será carregado o conteúdo das abas -->
                <div id="tab-content">
                    <!-- Conteúdo da aba ativa será carregado aqui -->
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Script para carregar o conteúdo das abas via AJAX -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Função para carregar o conteúdo dinamicamente
        function loadTabContent(url) {
            $.ajax({
                url: url,
                type: 'GET',
                success: function(data) {
                    // Carrega o conteúdo da resposta no div 'tab-content'
                    $('#tab-content').html(data);
                },
                error: function() {
                    alert('Erro ao carregar o conteúdo.');
                }
            });
        }

        // Quando uma aba é clicada
        $('a[data-tab]').on('click', function(event) {
            event.preventDefault(); // Impede o comportamento padrão do link
            var url = $(this).attr('href'); // Obtém a URL da aba
            loadTabContent(url); // Carrega o conteúdo da URL
            $('a[data-tab]').removeClass('active'); // Remove a classe 'active' de todas as abas
            $(this).addClass('active'); // Adiciona a classe 'active' à aba clicada
        });

        // Carregar o conteúdo da primeira aba automaticamente ao carregar a página
        var initialTabUrl = $('a[data-tab].active').attr('href');
        loadTabContent(initialTabUrl);
    });
</script>