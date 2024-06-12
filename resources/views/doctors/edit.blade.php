@extends('adminlte::page')

@section('title', 'Editar Doctor')

@section('content_header')
    <h1>Editar Doctor</h1>
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
        <form style="width: 100%; max-width: 600px;" action="{{ route('doctor.update', $doctor->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nombres</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Ingrese el nombre del doctor" value="{{ $doctor->name }}" required>
            </div>

            <div class="mb-3">
                <label for="surname" class="form-label">Apellidos</label>
                <input type="text" id="surname" name="surname" class="form-control" placeholder="Ingrese el apellido del doctor" value="{{ $doctor->surname }}" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Telefono</label>
                <input type="text" id="phone" name="phone" class="form-control" placeholder="Ingrese el teléfono del doctor" value="{{ $doctor->phone }}" required>
            </div>

            <div class="mb-3">
                <label for="speciality" class="form-label">Especialidad</label>
                <input type="text" id="speciality" name="speciality" class="form-control" placeholder="Ingrese la especialidad del doctor" value="{{ $doctor->speciality }}" required>
            </div>

            <div class="mb-3">
                <label for="cmp" class="form-label">CMP</label>
                <input type="cmp" id="cmp" name="cmp" class="form-control" placeholder="Ingrese el cmp del doctor" value="{{ $doctor->cmp }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" class="form-control" type="email" name="email" placeholder="Ingrese el email del doctor" value="{{ $doctor->email }}" required />
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label mr-2">Género</label>
                <select id="gender" name="gender" class="form-select" required>
                    <option value="M" {{ $doctor->gender == 'M' ? 'selected' : '' }}>Masculino</option>
                    <option value="F" {{ $doctor->gender == 'F' ? 'selected' : '' }}>Femenino</option>
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
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
