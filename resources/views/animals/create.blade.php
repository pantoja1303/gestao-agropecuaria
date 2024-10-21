<x-layout title="Animais">
    <x-animals.form 
        :action="route('animals.store')"
        title="Cadatrar Animal"
        :origins="$origins" 
        :types="$types" 
        :breeds="$breeds"
        :animal="$animals"
    />
</x-layout>