<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            'dni' => 'required|string|max:9',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Paciente::class]
        ],[
            'name.required' => 'El nombre es requerido',
            'name.string' => "El nombre debe ser texto",
            'surname.required' => 'El apellido es requerido',
            'surname.string' => "El apellido debe ser texto",
            'address.required' => 'La direccion es requerida',
            'address.string' => "La direccion debe ser texto",
            'phone.required' => 'El telefono es requerido',
            'gender.required' => 'El genero es requerido',
            'dni.required' => 'El DNI es requerido',
            'email.required' => 'El email es requerido',
        ]);

        // Crear un nuevo paciente
        $paciente = Paciente::create([
            'name' => $validatedData['name'],
            'surname' => $validatedData['surname'],
            'address' => $validatedData['address'],
            'phone' => $validatedData['phone'],
            'gender' => $validatedData['gender'],
            'dni' => $validatedData['dni'],
            'email' => $validatedData['email'],
            'password' => Hash::make($request->password),
        ]);

        $paciente = new Paciente();
        $paciente->name = $validatedData['name'];
        $paciente->surname = $validatedData['surname'];
        $paciente->gender = $validatedData['gender'];
        $paciente->address = $validatedData['address'];
        $paciente->phone = $validatedData['phone'];
        $paciente->update();

        // Redirigir a la lista de pacientes con un mensaje de éxito
        return redirect()->route('paciente.login')->with('success', 'Paciente creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('pacientes.show', compact('paciente'));
    }

    public function mostrarExamenes(string $id)
    {
        // Obtener el paciente por ID
        $paciente = Paciente::findOrFail($id);
        
        $historiasClinicas = $paciente->historiaClinica;
        $examenes = [];
    
        foreach ($historiasClinicas as $historiaClinica) {
            $examenes[] = $historiaClinica->examenes_medicos;
        }
        
        // Retornar la vista con los exámenes
        return view('pacientes.examenes', compact('paciente', 'examenes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('pacientes.edit', compact('paciente'));
    }

    public function editacion(string $id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('pacientes.editacion', compact('paciente'));
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
            'dni' => 'required|string|max:9'
        ],[
            'name.required' => 'El nombre es requerido',
            'name.string' => "El nombre debe ser texto",
            'surname.required' => 'El apellido es requerido',
            'surname.string' => "El apellido debe ser texto",
            'address.required' => 'La direccion es requerida',
            'address.string' => "La direccion debe ser texto",
            'phone.required' => 'El telefono es requerido',
            'gender.required' => 'El genero es requerido',
            'dni.required' => 'El DNI es requerido',
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
                'dni' => $validatedData['dni'],
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

    //Autenticacion
    public function showLoginForm()
    {
        return view('pacientes.login');
    }

    public function nuevo($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('pacientes.nuevo', compact('paciente'));
    }

    public function actualizacion(Request $request, string $id)
    {
        // Validar los datos de la solicitud
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:9',
            'gender' => 'required|in:M,F',
            'dni' => 'required|string|max:9'
        ],[
            'name.required' => 'El nombre es requerido',
            'name.string' => "El nombre debe ser texto",
            'surname.required' => 'El apellido es requerido',
            'surname.string' => "El apellido debe ser texto",
            'address.required' => 'La direccion es requerida',
            'address.string' => "La direccion debe ser texto",
            'phone.required' => 'El telefono es requerido',
            'gender.required' => 'El genero es requerido',
            'dni.required' => 'El DNI es requerido',
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
                'dni' => $validatedData['dni'],
            ]);


        // Redirigir a la lista de pacientes con un mensaje de éxito
        return redirect()->route('paciente.nuevo', compact('paciente'))->with('success', 'Datos actualizados exitosamente.');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('paciente')->attempt($credentials)) {
            $paciente = Auth::guard('paciente')->user();
            return redirect()->route('paciente.nuevo', compact('paciente'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('paciente')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
