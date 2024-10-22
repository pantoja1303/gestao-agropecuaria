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
        $request->validate([
            'ear_tag_number' => 'required|integer|min:1|unique:animals,ear_tag_number',
            'breed_id' => 'required|integer|min:1',
            'type_id' => 'required|integer|min:1',
            'origin_id' => 'required|integer|min:1',
            'status_id' => 'required|integer|min:1',
            'purchase_date' => 'date',
            'birth_date' => 'date',
        ],[
            'ear_tag_number.required' =>'Brinco do animal deve ser preenchido',
            'ear_tag_number.unique' =>'Este número de brinco já está cadastrado para outro animal',
            'breed_id.required' =>'Raça do animal deve ser preenchida',
            'type_id.required' =>'Tipo do animal deve ser preenchido',
            'origin_id.required' =>'Origem do animal deve ser preenchida',
            'status_id.required' =>'Status do animal deve ser preenchido',
            'birth_date.required' =>'Data de nascimento do animal deve ser preenchida'
        ]);

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
        $validatedData =  $request->validate([
            'ear_tag_number' => 'required|integer|min:1',
            'breed_id' => 'required|integer|min:1',
            'type_id' => 'required|integer|min:1',
            'origin_id' => 'required|integer|min:1',
            'status_id' => 'required|integer|min:1',
        ],[
            'ear_tag_number.required' =>'Brinco do animal deve ser preenchido',
            'breed_id.required' =>'Raça do animal deve ser preenchida',
            'type_id.required' =>'Tipo do animal deve ser preenchido',
            'origin_id.required' =>'Origem do animal deve ser preenchido',
            'status_id.required' =>'Status do animal deve ser preenchida'
        ]);

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
}
