<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCadastrado = Animal::count(); // Conta todos os animais cadastrados

        return view('dashboard.index', compact('totalCadastrado'));
    }
}
