<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctor = User::all();
        return view('doctors.index', compact('doctor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('doctors.store');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'gender' => ['required', 'string'],
            'speciality'=> ['required', 'string', 'max:255'],
            'phone'=> ['required', 'string', 'max:9'],
            'cmp'=> ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ],[
            'name.string' => 'El nombre debe ser texto',
            'surname.string' => 'El apellido debe ser texto',
            'address.string' => 'La dirección debe ser texto',
            'gender.required' => 'El género es requerido',
            'speciality.required' => 'La especialidad es requerida',
            'phone.required' => 'El teléfono es requerido',
            'cmp.required' => 'El CMP es requerido',
        ]
    );

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'gender' => $request->gender,
            'speciality' => $request->speciality,
            'phone' => $request->phone,
            'cmp' => $request->cmp,
            'password' => Hash::make($request->password),
        ])->assignRole("doctor");

        event(new Registered($user));

        if ($user->hasRole('doctor')) {
            return redirect()->route('doctor.index')->with('success','Doctor creado exitosamente');
        } elseif ($user->hasRole('administrador')) {
            return redirect()->route('login');
        }
        return redirect()->route('login');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $doctor = User::find($id);
        //$roles = Role::all();
        return view('doctors.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'gender' => ['required', 'string'],
            'speciality'=> ['required', 'string', 'max:255'],
            'phone'=> ['required', 'string', 'max:9'],
            'cmp'=> ['required', 'string', 'max:255']
        ],[
            'name.string' => 'El nombre debe ser texto',
            'surname.string' => 'El apellido debe ser texto',
            'address.string' => 'La dirección debe ser texto',
            'gender.required' => 'El género es requerido',
            'speciality.required' => 'La especialidad es requerida',
            'phone.required' => 'El teléfono es requerido',
            'cmp.required' => 'El CMP es requerido',
        ]
    );

        $doctor = User::findOrFail($id);
        $doctor->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'gender' => $request->gender,
            'speciality' => $request->speciality,
            'phone' => $request->phone,
            'cmp' => $request->cmp,
        ]);

        //$usuario->roles()->sync($request->roles);

        $doctor->update();

        return redirect()->route('doctor.index')->with('success','Doctor actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect()->route('doctor.index')->with('success','Doctor eliminado exitosamente');
    }
}
