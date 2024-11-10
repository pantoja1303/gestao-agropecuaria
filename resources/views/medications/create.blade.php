    <x-medications.form 
        :action="route('medications.store')"
        title="Cadatrar Medicação"
        :drugs="$drugs" 
        :statusMedications="$statusMedication" 
        :animals="$animals"
        :medications="$medications"
    />