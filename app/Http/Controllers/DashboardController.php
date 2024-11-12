<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCadastrado = Animal::count(); // Conta todos os animais cadastrados
        $totalAtivo = Animal::where('status_id', 1)->count();
        $totalMorto = Animal::where('status_id', 2)->count();
        $totalVendido = Animal::where('status_id', 3)->count();

        return view('dashboard.index', compact('totalCadastrado', 'totalMorto', 'totalVendido', 'totalAtivo'));
    }
}
