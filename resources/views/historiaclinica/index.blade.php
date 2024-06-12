@extends('adminlte::page')

@section('title', 'Lista de Historias Clínicas')

@section('content_header')
    <h1>Lista de Historias Clínicas</h1>
    @if (session('success'))
        <div id="success-alert" class="alert alert-success">
            {{ session('success') }}
        </div>

        <script>
            setTimeout(function() {
                var element = document.getElementById('success-alert');
                element.parentNode.removeChild(element);
            }, 5000);
        </script>
    @endif
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('clinica.create') }}" class="btn btn-primary">Agregar Historia Clinica</a>
    </div>
    <div class="card">
        <div class="card-body">
            @if ($historiasClinicas->isEmpty())
                <p>No hay historias clinicas registradas.</p>
            @else
            <table id="historias_clinicas_table" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Antecedentes Médicos</th>
                        <th>Indicaciones Médicas</th>
                        <th>Diagnóstico Médico</th>
                        <th>Alergias</th>
                        <th>Afiliación</th>
                        <th>CIE</th>
                        <th>Doctor</th>
                        <th>Paciente</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($historiasClinicas as $historiaClinica)
                        <tr>
                            <td>{{ $historiaClinica->antecedentes_medicos }}</td>
                            <td>{{ $historiaClinica->indicaciones_medicas }}</td>
                            <td>{{ $historiaClinica->diagnostico_medico }}</td>
                            <td>{{ $historiaClinica->alergias }}</td>
                            <td>{{ $historiaClinica->afiliacion }}</td>
                            <td>{{ $historiaClinica->cie }}</td>
                            <td>{{ $historiaClinica->doctor->name }}</td>
                            <td>{{ $historiaClinica->paciente->name }}</td>
                            <td>
                                <a href="{{ route('clinica.edit', $historiaClinica->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('clinica.destroy', $historiaClinica->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de que desea eliminar esta historia clínica?')">Eliminar</button>
                                </form>
                                <a href="{{ route('clinica.pdf', $historiaClinica->id) }}" class="btn btn-success btn-sm">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#historias_clinicas_table').DataTable();
        });
    </script>
@stop
