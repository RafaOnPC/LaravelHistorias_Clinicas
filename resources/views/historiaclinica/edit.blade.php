@extends('adminlte::page')

@section('title', 'Editar Historia Clínica')

@section('content_header')
    <h1>Editar Historia Clínica</h1>

    <h1>Editar Paciente</h1>

    @if ($errors->any())
    <div id="error-alert" class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

    <script>
        setTimeout(function() {
            var element = document.getElementById('error-alert');
            element.parentNode.removeChild(element);
        }, 5000);
    </script>
@endif

    
@stop

@section('content')
    <div class="d-flex justify-content-center">
        <form style="width: 100%; max-width: 600px;" action="{{ route('clinica.update', $historiaClinica->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="antecedentes_medicos" class="form-label">Antecedentes Médicos</label>
                <textarea id="antecedentes_medicos" name="antecedentes_medicos" class="form-control" placeholder="Ingrese los antecedentes médicos" required>{{ $historiaClinica->antecedentes_medicos }}</textarea>
            </div>

            <div class="mb-3">
                <label for="indicaciones_medicas" class="form-label">Indicaciones Médicas</label>
                <textarea id="indicaciones_medicas" name="indicaciones_medicas" class="form-control" placeholder="Ingrese las indicaciones médicas" required>{{ $historiaClinica->indicaciones_medicas }}</textarea>
            </div>

            <div class="mb-3">
                <label for="diagnostico_medico" class="form-label">Diagnóstico Médico</label>
                <textarea id="diagnostico_medico" name="diagnostico_medico" class="form-control" placeholder="Ingrese el diagnóstico médico" required>{{ $historiaClinica->diagnostico_medico }}</textarea>
            </div>

            <div class="mb-3">
                <label for="alergias" class="form-label">Alergias</label>
                <textarea id="alergias" name="alergias" class="form-control" placeholder="Ingrese las alergias" required>{{ $historiaClinica->alergias }}</textarea>
            </div>

            <div class="mb-3">
                <label for="afiliacion" class="form-label">Afiliación</label>
                <input type="text" id="afiliacion" name="afiliacion" class="form-control" placeholder="Ingrese la afiliación" value="{{ $historiaClinica->afiliacion }}" required>
            </div>

            <div class="mb-3">
                <label for="cie" class="form-label">CIE</label>
                <input type="text" id="cie" name="cie" class="form-control" placeholder="Ingrese el código CIE" value="{{ $historiaClinica->cie }}" required>
            </div>

            <div class="mb-3">
                <label for="doctor_id" class="form-label">Doctor</label>
                <select id="doctor_id" name="doctor_id" class="form-select" required>
                    @foreach ($doctores as $doctor)
                        <option value="{{ $doctor->id }}" {{ $doctor->id == $historiaClinica->doctor_id ? 'selected' : '' }}>{{ $doctor->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="paciente_id" class="form-label">Paciente</label>
                <select id="paciente_id" name="paciente_id" class="form-select" required>
                    @foreach ($pacientes as $paciente)
                        <option value="{{ $paciente->id }}" {{ $paciente->id == $historiaClinica->paciente_id ? 'selected' : '' }}>{{ $paciente->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </form>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
@stop

@section('js')
    {{-- Add here extra scripts --}}
@stop
