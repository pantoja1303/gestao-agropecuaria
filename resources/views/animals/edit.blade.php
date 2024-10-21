<x-layout title="Animais">
    <x-animals.form
        :action="route('animals.update', $animal->id)"
        :title="'Editar animal #' . $animal->id"
        :origins="$origins"
        :types="$types"
        :breeds="$breeds"
        :animal="$animal"
    />
</x-layout>