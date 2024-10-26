    <x-animals.form 
        :action="route('animals.store')"
        title="Cadatrar Animal"
        :origins="$origins" 
        :types="$types" 
        :breeds="$breeds"
        :statuses="$status"
        :animal="$animals"
    />