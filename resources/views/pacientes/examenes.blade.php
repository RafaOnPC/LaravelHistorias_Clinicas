@extends('adminlte::page')

@section('title', 'Exámenes Médicos de Paciente')

@section('content_header')
    <h1>Exámenes Médicos de {{ $paciente->name }} {{ $paciente->surname }}</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('paciente.index') }}" class="btn btn-primary">Volver a Pacientes</a>
    </div>
    <div class="card-body">
        @if(empty($examenes))
            <p>No hay exámenes médicos para este paciente.</p>
        @else
        <table id="examenes_table" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Exámenes Médicos</th>
                </tr>
            </thead>
            <tbody>
                @foreach($examenes as $index => $examen)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $examen }}</td>
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
            $('#examenes_table').DataTable();
        });
    </script>
@stop
