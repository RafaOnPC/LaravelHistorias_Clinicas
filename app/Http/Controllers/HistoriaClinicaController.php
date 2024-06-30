<?php

namespace App\Http\Controllers;

use App\Models\HistoriaClinica;
use App\Models\Paciente;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class HistoriaClinicaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $historiasClinicas = HistoriaClinica::all();
        return view('historiaclinica.index', compact('historiasClinicas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctores = User::all();
        $pacientes = Paciente::all();
        return view('historiaclinica.store', compact('doctores', 'pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos de la solicitud
        $validatedData = $request->validate([
            'antecedentes_medicos'=> 'required|string|max:255',
            'indicaciones_medicas'=> 'required|string|max:255',
            'diagnostico_medico'=> 'required|string|max:255',
            'examenes_medicos'=> 'required|string|max:255',
            'alergias'=> 'required|string|max:255',
            'afiliacion'=> 'required|string|max:255',
            "cie" => 'required|string|max:255',
            "doctor_id" => 'required',
            "paciente_id" => 'required']
            ,[
                'antecedentes_medicos.required' => 'El campo es requerido',
                'indicaciones_medicas.required' => 'El campo es requerido',
                'diagnostico_medico.required' => 'El campo es requerido',
                'examenes_medicos.required' => 'El campo es requerido',
                'alergias.required' => 'El campo es requerido',
                'afiliacion.required' => 'El campo es requerido',
                'cie.required' => 'El campo es requerido',
                'doctor_id.required' => 'El campo es requerido',
                'paciente_id.required' => 'El campo es requerido',
            ]
            );


            $historiaClinica = new HistoriaClinica();
            $historiaClinica->antecedentes_medicos = $validatedData['antecedentes_medicos'];
            $historiaClinica->indicaciones_medicas = $validatedData['indicaciones_medicas'];
            $historiaClinica->diagnostico_medico = $validatedData['diagnostico_medico'];
            $historiaClinica->examenes_medicos = $validatedData['examenes_medicos'];
            $historiaClinica->alergias = $validatedData['alergias'];
            $historiaClinica->afiliacion = $validatedData['afiliacion'];
            $historiaClinica->cie = $validatedData['cie'];
            $historiaClinica->doctor_id = $validatedData['doctor_id'];
            $historiaClinica->paciente_id = $validatedData['paciente_id'];
            $historiaClinica->save();


            return redirect()->route('clinica.index')->with('success', 'Historia clinica creada exitosamente.');

    }

    public function pdf(String $id){
        $historiaClinica = HistoriaClinica::findOrFail($id);
        $pdf = Pdf::loadView('historiaclinica.pdf', compact('historiaClinica'));
        return $pdf->stream();
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
    public function edit($id)
    {
        $historiaClinica = HistoriaClinica::findOrFail($id);
        $doctores = User::all(); 
        $pacientes = Paciente::all(); 

        return view('historiaclinica.edit', compact('historiaClinica', 'doctores', 'pacientes'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos de la solicitud
        $validatedData = $request->validate([
            'antecedentes_medicos' => 'required|string|max:255',
            'indicaciones_medicas' => 'required|string|max:255',
            'diagnostico_medico' => 'required|string|max:255',
            'examenes_medicos'=> 'required|string|max:255',
            'alergias' => 'required|string|max:255',
            'afiliacion' => 'required|string|max:255',
            'cie' => 'required|string|max:255',
            'doctor_id' => 'required',
            'paciente_id' => 'required'
        ], [
            'antecedentes_medicos.required' => 'El campo Antecedentes Médicos es requerido.',
            'indicaciones_medicas.required' => 'El campo Indicaciones Médicas es requerido.',
            'diagnostico_medico.required' => 'El campo Diagnóstico Médico es requerido.',
            'examenes_medicos.required' => 'El campo es requerido',
            'alergias.required' => 'El campo Alergias es requerido.',
            'afiliacion.required' => 'El campo Afiliación es requerido.',
            'cie.required' => 'El campo CIE es requerido.',
            'doctor_id.required' => 'Debe seleccionar un doctor.',
            'paciente_id.required' => 'Debe seleccionar un paciente.'
        ]);

        // Buscar la historia clínica a actualizar
        $historiaClinica = HistoriaClinica::findOrFail($id);

        // Actualizar los campos con los datos validados
        $historiaClinica->update($validatedData);

        // Redirigir a la lista de historias clínicas con un mensaje de éxito
        return redirect()->route('clinica.index')->with('success', 'Historia clínica actualizada exitosamente.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $historiaClinica = HistoriaClinica::findOrFail($id);
        $historiaClinica->delete();

        return redirect()->route('clinica.index')->with('success', 'Historia clinica eliminada exitosamente');
    }
}
