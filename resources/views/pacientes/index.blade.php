@extends('adminlte::page')

@section('title', 'Lista de Pacientes')

@section('content_header')
    <h1>Lista de Pacientes</h1>

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
        <div class="card-body">
            @if ($pacientes->isEmpty())
                <p>No hay pacientes registrados.</p>
            @else
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Género</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pacientes as $paciente)
                            <tr>
                                <td>{{ $paciente->id }}</td>
                                <td>{{ $paciente->name }}</td>
                                <td>{{ $paciente->surname }}</td>
                                <td>{{ $paciente->address }}</td>
                                <td>{{ $paciente->phone }}</td>
                                <td>{{ $paciente->gender == 'M' ? 'Masculino' : 'Femenino' }}</td>
                                <td>
                                    <a href="{{ route('paciente.edit', $paciente->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <a href="{{ route('paciente.show', $paciente->id) }}" class="btn btn-warning btn-sm">Ver</a>
                                    <form action="{{ route('paciente.destroy', $paciente->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de que desea eliminar este paciente?')">Eliminar</button>
                                    </form>
                                    <a href="{{ route('paciente.examenes', $paciente->id) }}" class="btn btn-info btn-sm">Exámenes</a>
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
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
