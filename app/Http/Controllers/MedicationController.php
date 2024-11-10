<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Drug;
use App\Models\StatusMedication;
use App\Models\Animal;
use App\Models\Medication;

class MedicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medications = DB::table('medications')
        ->leftJoin('status_medications', 'status_medications.id', '=', 'medications.status_medication_id')
        ->leftJoin('drugs', 'drugs.id', '=', 'medications.drug_id')
        ->leftJoin('drugs_classifications', 'drugs_classifications.id', '=', 'drugs.drug_classification_id')
        ->leftJoin('animals', 'animals.id', '=', 'medications.animal_id')
        ->select(
            'medications.*'
            ,'status_medications.description as status_medication_description'
            ,'drugs.description as drug_description'
            ,'drugs_classifications.description as drug_classification_description'
            ,'animals.ear_tag_number as ear_tag_number'
        )
        ->get();

        return view('medications.index', compact('medications'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $drugs = Drug::all();
        $statusMedication = StatusMedication::all();
        $animals = Animal::all();
        $medications = Medication::all();

        return view('medications.create',compact('drugs','statusMedication','animals','medications'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'animal_id' => 'required|integer|min:1',
            'administration_date' => 'required|date',
            'quantity' => 'required|numeric|min:1',
            'drug_id' => 'required|integer|min:1',
            'status_medication_id' => 'required|integer|min:1',
        ],[
            'animal_Id.required' =>'Brinco do animal deve ser preenchido',
            'administration_date.unique' =>'Data da administração deve ser preenchida',
            'quantity.required' =>'Quantidade deve ser preenchida',
            'drug_id.required' =>'Medicamento deve ser preenchido',
            'status_medication_id.required' =>'Status deve ser preenchido'
        ]);

        Medication::create($request->all());

        return redirect()->route('medications.index')->with('success', "Medicação cadastrada com sucesso!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medication $medication, Request $request)
    {

        $drugs = Drug::all();
        $statusMedication = StatusMedication::all();
        $animals = Animal::all();

        return view('medications.edit',compact('drugs','statusMedication','animals','medication'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'animal_id' => 'required|integer|min:1',
            'administration_date' => 'required|date',
            'quantity' => 'required|numeric|min:1',
            'drug_id' => 'required|integer|min:1',
            'status_medication_id' => 'required|integer|min:1',
        ],[
            'animal_Id.required' =>'Brinco do animal deve ser preenchido',
            'administration_date.unique' =>'Data da administração deve ser preenchida',
            'quantity.required' =>'Quantidade deve ser preenchida',
            'drug_id.required' =>'Medicamento deve ser preenchido',
            'status_medication_id.required' =>'Status deve ser preenchido'
        ]);

        // Encontrar o animal pelo ID
        $medication = Medication::findOrFail($id);

        // Atualizar os dados do animal com os dados validados
        $medication->update($validatedData);

        return response()->json(['success' => true]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
