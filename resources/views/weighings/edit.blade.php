<x-weighing.form
action="{{ route('animals.weighings.update', ['animal' => $animal->id, 'weighing' => $weighing->id]) }}"
:title="'Editar pesagem'"
:weighing="$weighing"
:animal="$animal"
/>


