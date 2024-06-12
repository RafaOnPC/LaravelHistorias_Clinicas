@extends('adminlte::page')

@section('title', 'Paciente')

@section('content_header')

    <h1>Inserte un nuevo doctor</h1>
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
        <form style="width: 100%; max-width: 600px;" action="{{ route('doctor.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombres</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Ingrese el nombre del doctor" required>
            </div>

            <div class="mb-3">
                <label for="surname" class="form-label">Apellidos</label>
                <input type="text" id="surname" name="surname" class="form-control" placeholder="Ingrese el apellido del doctor" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Telefono</label>
                <input type="text" id="phone" name="phone" class="form-control" placeholder="Ingrese el teléfono del doctor" required>
            </div>

            <div class="mb-3">
                <label for="speciality" class="form-label">Especialidad</label>
                <input type="text" id="speciality" name="speciality" class="form-control" placeholder="Ingrese la especialidad del doctor" required>
            </div>

            <div class="mb-3">
                <label for="cmp" class="form-label">CMP</label>
                <input type="cmp" id="cmp" name="cmp" class="form-control" placeholder="Ingrese el cmp del doctor" required>
            </div>

             <!-- Email Address -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" class="form-control" type="email" name="email" placeholder="Ingrese el email del doctor" />
            </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input id="password" class="form-control"
                            type="password"
                            name="password"
                            placeholder="Ingrese su contraseña" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>

            <input id="password_confirmation" class="form-control"
                            type="password"
                            name="password_confirmation" placeholder="Confirme su contraseña" />
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
            <div class="mt-4 text-center">
                <p class="text-gray-600">
                    {{ __('If you are already registered as a doctor, please') }} 
                    <a href="{{ route('login') }}" class="underline text-indigo-600 hover:text-indigo-900">{{ __('click here') }}</a>.
                </p>
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
