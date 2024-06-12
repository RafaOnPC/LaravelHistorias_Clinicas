<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HistoriaClinicaController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Pacientes
Route::get('/paciente', [PacienteController::class, 'index'])->middleware('can:paciente.index')->name('paciente.index');
Route::get('/paciente/create', [PacienteController::class, 'create'])->middleware('can:paciente.create')->name('paciente.create');
Route::post('/paciente', [PacienteController::class, 'store'])->name('paciente.store');
Route::get('/paciente/{id}', [PacienteController::class, 'edit'])->middleware('can:paciente.edit')->name('paciente.edit');
Route::put('/paciente/{id}', [PacienteController::class, 'update'])->name('paciente.update');
Route::delete('/paciente/{id}', [PacienteController::class, 'destroy'])->middleware('can:paciente.destroy')->name('paciente.destroy');

//Invitado
Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';
