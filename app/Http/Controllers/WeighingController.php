<?php
namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Weighing;
use Illuminate\Http\Request;

class WeighingController extends Controller
{
    public function index(Animal $animal)
    {
        $weighings = $animal->weighings; // Pesagens relacionadas ao animal
        
        return view('weighings.index', compact('animal', 'weighings'));
    }

    public function create(Animal $animal)
    {
        return view('weighings.create', compact('animal'));
    }

    public function store(Request $request, Animal $animal)
    {
        $request->validate([
            'weighing_date' => 'required|date',
            'weight' => 'required|numeric|min:0',
        ]);

        $weighing = $animal->weighings()->create($request->only('weighing_date', 'weight'));

        if ($weighing) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function edit(Animal $animal, Weighing $weighing)
    {
        return view('weighings.edit', compact('animal', 'weighing'));
    }

    public function update(Request $request, Animal $animal, Weighing $weighing)
    {
        $request->validate([
            'weighing_date' => 'required|date',
            'weight' => 'required|numeric|min:0',
        ]);

        $weighing->update($request->only('weighing_date', 'weight'));

        return redirect()->route('animals.weighings.index', $animal->id)->with('success', 'Pesagem atualizada com sucesso.');
    }

    public function destroy(Animal $animal, Weighing $weighing)
    {
        $weighing->delete();

        return redirect()->route('animals.weighings.index', $animal->id)->with('success', 'Pesagem excluída com sucesso.');
    }
}

