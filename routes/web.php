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

Route::get('/chat', function () {
    return redirect()->away('http://localhost:3000');
})->name('chat.me');

Route::get('/paciente/login', [PacienteController::class, 'showLoginForm'])->name('paciente.login');
Route::post('/paciente/loginIn', [PacienteController::class, 'login'])->name('paciente.storing');
Route::post('/paciente/logout', [PacienteController::class, 'logout'])->name('paciente.logout');
Route::get('/paciente/nuevo/{paciente}', [PacienteController::class, 'nuevo'])->name('paciente.nuevo');
Route::get('/pacientes/{id}', [PacienteController::class, 'editacion'])->name('paciente.editacion');
Route::put('/pacientes/{id}', [PacienteController::class, 'actualizacion'])->name('paciente.actualizacion');


Route::get("/clinica/pdf/{id}", [HistoriaClinicaController::class, 'pdf'])->name("clinica.pdf");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Pacientes
Route::get('/paciente', [PacienteController::class, 'index'])->name('paciente.index');
Route::get('/paciente/create', [PacienteController::class, 'create'])->name('paciente.create');
Route::post('/paciente', [PacienteController::class, 'store'])->name('paciente.store');
Route::get('/paciente/show/{id}', [PacienteController::class, 'show'])->name('paciente.show');
Route::get('/paciente/{id}', [PacienteController::class, 'edit'])->name('paciente.edit');
Route::put('/paciente/{id}', [PacienteController::class, 'update'])->name('paciente.update');
Route::delete('/paciente/{id}', [PacienteController::class, 'destroy'])->name('paciente.destroy');
Route::get('/paciente/{id}/examenes', [PacienteController::class, 'mostrarExamenes'])->name('paciente.examenes');


/* 
//Pacientes - Auth
Route::prefix('paciente')->group(function () {
    Route::get('login', [PacienteController::class, 'showLoginForm'])->name('paciente.login');
    Route::post('login', [PacienteController::class, 'login']);
    Route::post('logout', [PacienteController::class, 'logout'])->name('paciente.logout');

    Route::middleware('auth:paciente')->group(function () {
        // Añadir rutas protegidas para pacientes
        Route::get('dashboard', function () {
            return view('paciente.dashboard'); // Crear la vista de dashboard para pacientes
        })->name('paciente.dashboard');
    });
});
*/
//Doctor
Route::get('/doctor', [DoctorController::class, 'index'])->middleware('can:doctor.index')->name('doctor.index');
Route::get('/doctor/create', [DoctorController::class, 'create'])->name('doctor.create');
Route::post('/doctor', [DoctorController::class, 'store'])->name('doctor.store');
Route::get('/doctor/{id}', [DoctorController::class, 'edit'])->middleware('can:doctor.edit')->name('doctor.edit');
Route::put('/doctor/{id}', [DoctorController::class, 'update'])->name('doctor.update');
Route::delete('/doctor/{id}', [DoctorController::class, 'destroy'])->middleware('can:doctor.destroy')->name('doctor.destroy');

//Historias clinicas
Route::get('/clinica', [HistoriaClinicaController::class, 'index'])->middleware('can:clinica.index')->name('clinica.index');
Route::get('/clinica/create', [HistoriaClinicaController::class, 'create'])->middleware('can:clinica.create')->name('clinica.create');
Route::post('/clinica', [HistoriaClinicaController::class, 'store'])->name('clinica.store');
Route::get('/clinica/{id}', [HistoriaClinicaController::class, 'edit'])->middleware('can:clinica.edit')->name('clinica.edit');
Route::put('/clinica/{id}', [HistoriaClinicaController::class, 'update'])->name('clinica.update');
Route::delete('/clinica/{id}', [HistoriaClinicaController::class, 'destroy'])->middleware('can:clinica.destroy')->name('clinica.destroy');

//Invitado
Route::get('/', function () {
    return view('welcome');
})->name('inicio');

require __DIR__.'/auth.php';
