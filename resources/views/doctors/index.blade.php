@extends('adminlte::page')

@section('title', 'Lista de Doctores')

@section('content_header')

    <h1>Lista de Doctores</h1>
    
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
        @can('doctor.create')
            <div class="card-header">
                <a href="{{ route('doctor.create') }}" class="btn btn-primary">Agregar Nuevo Doctor</a>
            </div>
        @endcan
        <div class="card-body">
            @if ($doctor->isEmpty())
                <p>No hay pacientes registrados.</p>
            @else
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Especialidad</th>
                            <th>Teléfono</th>
                            <th>Género</th>
                            @can('doctor.edit')
                            <th>Acciones</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($doctor as $doc)
                            <tr>
                                <td>{{ $doc->id }}</td>
                                <td>{{ $doc->name }}</td>
                                <td>{{ $doc->surname }}</td>
                                <td>{{ $doc->speciality }}</td>
                                <td>{{ $doc->phone }}</td>
                                <td>{{ $doc->gender == 'M' ? 'Masculino' : 'Femenino' }}</td>
                                @can('doctor.edit')
                                    <td>
                                        <a href="{{ route('doctor.edit', $doc->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                        <form action="{{ route('doctor.destroy', $doc->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de que desea eliminar este paciente?')">Eliminar</button>
                                        </form>
                                    </td>
                                @endcan
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
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
