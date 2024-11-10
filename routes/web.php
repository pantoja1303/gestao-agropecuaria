<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\MedicationController;
use App\Http\Controllers\WeighingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::resource('animals', AnimalController::class);
Route::resource('medications', MedicationController::class);

//a pesagem e diretamente vinculada ao animal
Route::resource('animals.weighings', WeighingController::class);