<x-simple title="Pesagens">
    <a href="{{ route('animals.weighings.create', $animal->id) }}" class="btn" onclick="openPopup(this.href); return false;">
    <img src="{{ asset('images/registro.png') }}" alt="Registrar Pesagem" title="Registrar Pesagem" width="40" height="40">
    </a>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Data</th>
                <th scope="col">Peso</th>
                <th scope="col">Diferença de Peso</th>
                <th scope="col">Ganho (%)</th>
                <th scope="col">Ganho Diário (kg)</th>
            </tr>
        </thead>
        <tbody>
            @php
                $previousWeighing = null; // Variável para guardar a pesagem anterior
            @endphp

            @foreach($weighings as $weighing)
                <tr onclick="openPopup('{{ route('animals.weighings.edit', ['animal' => $animal->id, 'weighing' => $weighing->id]) }}')" style="cursor: pointer;">
                    <td>{{ \Carbon\Carbon::parse($weighing->weighing_date)->format('d/m/Y') }}</td>
                    <td>{{ $weighing->weight }} kg</td>
                    
                    @if ($previousWeighing)
                        @php
                            // Calcula a diferença de peso
                            $weightDifference = $weighing->weight - $previousWeighing->weight;

                            // Calcula o ganho percentual
                            $weightGainPercent = $previousWeighing->weight > 0 
                                ? ($weightDifference / $previousWeighing->weight) * 100 
                                : 0;

                            // Calcula o ganho diário
                            $daysDifference = \Carbon\Carbon::parse($previousWeighing->weighing_date)
                                ->diffInDays(\Carbon\Carbon::parse($weighing->weighing_date));

                            $dailyWeightGain = $daysDifference > 0 
                                ? $weightDifference / $daysDifference 
                                : 0;
                        @endphp

                        <td>{{ number_format($weightDifference, 2) }} kg</td>
                        <td>{{ number_format($weightGainPercent, 2) }}%</td>
                        <td>{{ number_format($dailyWeightGain, 2) }} kg/dia</td>
                    @else
                        <!-- Caso seja a primeira pesagem, não há diferença ou ganhos a mostrar -->
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    @endif

                    @php
                        // Atualiza a pesagem anterior para a próxima iteração
                        $previousWeighing = $weighing;
                    @endphp
                </tr>
            @endforeach
        </tbody>
    </table>
</x-simple>