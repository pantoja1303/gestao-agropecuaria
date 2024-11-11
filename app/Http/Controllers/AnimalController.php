<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Animal;
use App\Models\Origin;
use App\Models\Type;
use App\Models\Breed;
use App\Models\Status;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $animals = DB::table('animals')
        ->leftJoin('origin', 'animals.origin_id', '=', 'origin.id')
        ->leftJoin('type', 'animals.type_id', '=', 'type.id')
        ->leftJoin('breed', 'animals.breed_id', '=', 'breed.id')
        ->leftJoin('status', 'animals.status_id', '=', 'status.id')
        ->select(
            'animals.*'
            ,'origin.description as origin_description'
            ,'type.description as type_description'
            ,'breed.description as breed_description'
            ,'status.description as status_description'
        )
        ->get();

        return view('animals.index', compact('animals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $origins = Origin::all();
        $types = Type::all();
        $breeds = Breed::all();
        $status = Status::all();
        $animals = Animal::all();

        return view('animals.create',compact('origins','types','breeds','animals','status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validatedData($request);

        $animal = Animal::create($request->all());

        return redirect()->route('animals.index')->with('success', "Animal (brinco: {$animal->ear_tag_number}) cadastrado com sucesso!");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Animal $animal, Request $request)
    {
        $origins = Origin::all();
        $types = Type::all();
        $breeds = Breed::all();
        $status = Status::all();

        return view('animals.edit', compact('origins','types','breeds','animal','status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $this->validatedData($request,$id);
        // Encontrar o animal pelo ID
        $animal = Animal::findOrFail($id);

        // Atualizar os dados do animal com os dados validados
        $animal->update($validatedData);

        return redirect()->route('animals.index')->with('success', 'Animal atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal,Request $request)
    {
        $animal->delete();

        return redirect()->route('animals.index')->with('success', "Animal (brinco: {$animal->ear_tag_number}) excluído com sucesso!");
    }
 
    public function show($id)
    {
        // Encontre o animal pelo ID
        $animal = Animal::findOrFail($id);

        // Retorne a view principal 'show.blade.php'
        return view('animals.show', compact('animal'));
    }

    public function validatedData(Request $request,int $id = 0) {

        $rules = [
            'breed_id' => 'required|integer|min:1',
            'type_id' => 'required|integer|min:1',
            'origin_id' => 'required|integer|min:1',
            'status_id' => 'required|integer|min:1',
            'birth_date' => 'date|nullable', // birth_date pode ser opcional
        ];

        if ($request->origin_id == 1) { // Ajuste o valor 1 para o tipo correto de "compra"
            $rules['purchase_date'] = 'required|date|after_or_equal:birth_date';
        } else {
            // Caso o tipo não seja "compra", a data de compra pode ser nula
            $rules['purchase_date'] = 'nullable|date';
        }

        if(!empty($id)){
            $rules['ear_tag_number'] ='required|integer|min:1';
        }else{
            $rules['ear_tag_number'] ='required|integer|min:1|unique:animals,ear_tag_number';
        }

        return $request->validate($rules,[
            'ear_tag_number.required' =>'Brinco do animal deve ser preenchido',
            'breed_id.required' =>'Raça do animal deve ser preenchida',
            'type_id.required' =>'Tipo do animal deve ser preenchido',
            'origin_id.required' =>'Origem do animal deve ser preenchido',
            'status_id.required' =>'Status do animal deve ser preenchida',
            'purchase_date.required' => 'Data da compra não foi preenchida',
            'purchase_date.after_or_equal'=> 'Data da compra deve ser igual ou maior a data do nascimento'
        ]);
    }
}
