    <x-medications.form 
        :action="route('medications.update',$medication->id)"
        title="'Editar Medicação #' . $medication->id"
        :drugs="$drugs" 
        :statusMedications="$statusMedication" 
        :animals="$animals"
        :medication="$medication"
    />