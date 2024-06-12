@extends('adminlte::page')

@section('title', 'Paciente')

@section('content_header')

    <h1>Inserte un nuevo paciente</h1>
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
        <form style="width: 100%; max-width: 600px;" action="{{ route('paciente.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombres</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Ingrese el nombre del paciente" required>
            </div>

            <div class="mb-3">
                <label for="surname" class="form-label">Apellidos</label>
                <input type="text" id="surname" name="surname" class="form-control" placeholder="Ingrese el apellido del paciente" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Direccion</label>
                <input type="text" id="address" name="address" class="form-control" placeholder="Ingrese la dirección del paciente" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Telefono</label>
                <input type="text" id="phone" name="phone" class="form-control" placeholder="Ingrese el teléfono del paciente" required>
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label mr-2">Genero</label>
                <select id="gender" name="gender" class="form-select" required>
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            
        </form>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
