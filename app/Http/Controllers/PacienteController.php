<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Retornas toda los registros de bd
        $pacientes = Paciente::all();

        //Redirreccion a la vista
        return view('pacientes.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pacientes.store');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos de la solicitud
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:9',
            'gender' => 'required|in:M,F',
        ],[
            'name.required' => 'El nombre es requerido',
            'name.string' => "El nombre debe ser texto",
            'surname.required' => 'El apellido es requerido',
            'surname.string' => "El apellido debe ser texto",
            'address.required' => 'La direccion es requerida',
            'address.string' => "La direccion debe ser texto",
            'phone.required' => 'El telefono es requerido',
            'gender.required' => 'El genero es requerido',
        ]);

        // Crear un nuevo paciente
        $paciente = Paciente::create([
            'name' => $validatedData['name'],
            'surname' => $validatedData['surname'],
            'address' => $validatedData['address'],
            'phone' => $validatedData['phone'],
            'gender' => $validatedData['gender'],
        ]);

        $paciente = new Paciente();
        $paciente->name = $validatedData['name'];
        $paciente->surname = $validatedData['surname'];
        $paciente->gender = $validatedData['gender'];
        $paciente->address = $validatedData['address'];
        $paciente->phone = $validatedData['phone'];
        $paciente->update();

        // Redirigir a la lista de pacientes con un mensaje de éxito
        return redirect()->route('paciente.index')->with('success', 'Paciente creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('paciente.show', compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('pacientes.edit', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos de la solicitud
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:9',
            'gender' => 'required|in:M,F',
        ],[
            'name.required' => 'El nombre es requerido',
            'name.string' => "El nombre debe ser texto",
            'surname.required' => 'El apellido es requerido',
            'surname.string' => "El apellido debe ser texto",
            'address.required' => 'La direccion es requerida',
            'address.string' => "La direccion debe ser texto",
            'phone.required' => 'El telefono es requerido',
            'gender.required' => 'El genero es requerido',
        ]);

        // Encontrar el paciente existente
            $paciente = Paciente::findOrFail($id);

            // Actualizar los datos del paciente existente
            $paciente->update([
                'name' => $validatedData['name'],
                'surname' => $validatedData['surname'],
                'address' => $validatedData['address'],
                'phone' => $validatedData['phone'],
                'gender' => $validatedData['gender'],
            ]);


        // Redirigir a la lista de pacientes con un mensaje de éxito
        return redirect()->route('paciente.index')->with('success', 'Paciente actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->delete();

        // Redirigir a la lista de pacientes con un mensaje de éxito
        return redirect()->route('paciente.index')->with('success', 'Paciente eliminado exitosamente.');
    }
}
