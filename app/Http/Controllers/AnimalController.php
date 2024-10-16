<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Animal;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $animals = DB::table('animals')
        ->leftJoin('origins', 'animals.origin_id', '=', 'origins.id')
        ->leftJoin('animal_type', 'animals.animal_type_id', '=', 'animal_type.id')
        ->leftJoin('animal_breed', 'animals.animal_breed_id', '=', 'animal_breed.id')
        ->select('animals.*', 'origins.description as origin_description','animal_type.description as animal_type_description','animal_breed.description as animal_breed_description') 
        ->get();

        //$animals = Animal::all();
        return view('animals.index', compact('animals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('animals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ear_tag_number' => 'required|integer|min:1',
            'id_breed' => 'required|integer|min:1',
            'type_of_animal' => 'required|integer|min:1',
            'origin' => 'required|integer|min:1',
            'purchase_date' => 'date',
            'birth_date' => 'date',
        ],[
            'ear_tag_number.min' =>'Brinco do animal deve ser preenchido',
            'id_breed.min' =>'Raça do animal deve ser preenchida',
            'type_of_animal.min' =>'Tipo do animal deve ser preenchido',
            'origin.min' =>'Origem do animal deve ser preenchida'
        ]);

        Animal::create($request->all());

        return redirect()->route('animals.index')->with('success', 'Animal cadastrado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Animal $animal, Request $request)
    {
        return view('animals.edit', compact('animal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'ear_tag_number' => 'required|integer|min:1',
            'id_breed' => 'required|integer|min:1',
            'type_of_animal' => 'required|integer|min:1',
            'origin' => 'required|integer|min:1',
        ],[
            'ear_tag_number.min' =>'Brinco do animal deve ser preenchido',
            'id_breed.min' =>'Raça do animal deve ser preenchida',
            'type_of_animal.min' =>'Tipo do animal deve ser preenchido',
            'origin.min' =>'Origem do animal deve ser preenchida'
        ]);

        $animal->update($request->all());

        return redirect()->route('animals.index')->with('success', 'Animal atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal,Request $request)
    {
        $animal->delete();

        return redirect()->route('animals.index')->with('success', 'Animal excluído com sucesso!');
    }
}
