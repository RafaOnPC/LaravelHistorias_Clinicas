@extends('adminlte::page')

@section('title', 'Bienvenido')

@section('content_header')
    <h1>Bienvenido al Sistema de Gestión de Historias Clínicas</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">¿Qué puedes hacer en nuestro sistema?</h3>
                </div>
                <div class="card-body">
                    <img src="https://f.hubspotusercontent40.net/hubfs/460541/Blog%20Images%20%28Optimized%29/modern-hospital-building-picture-id1312706413%20%281%29%20%281%29.jpg" class="img-fluid mb-3" alt="Imagen de un hospital">
                    <p>Bienvenido al Sistema de Gestión de Historias Clínicas. Aquí puedes:</p>
                    <ul>
                        <li>Administrar doctores y pacientes.</li>
                        <li>Registrar historias clínicas de pacientes.</li>
                        <li>Gestionar tratamientos médicos.</li>
                        <li>Visualizar reportes</li>
                        <li>¡Y mucho más!</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">¡Comienza a usar nuestro sistema ahora!</h3>
                </div>
                <div class="card-body">
                    <img src="https://www.example.com/hospital2.jpg" class="img-fluid mb-3" alt="Imagen de un hospital">
                    <p>Afiliado inicia sesión en nuestro sistema.</p>
                    <p>Si no tienes un usuario, regístrate.</p>
                    <a href="{{ route('doctor.create') }}" class="btn btn-primary">Registrarse</a>
                    <a href="{{ route('login') }}" class="btn btn-success">Iniciar sesión</a>
                </div>
                <br>
                <div class="card-body">
                    <img src="https://www.example.com/hospital3.jpg" class="img-fluid mb-3" alt="Imagen de un hospital">
                    <p>Afiliado inicia sesión en nuestro sistema.</p>
                    <p>Si no tienes un usuario, regístrate.</p>
                    <a href="{{ route('paciente.create') }}" class="btn btn-primary">Registrarse</a>
                    <a href="{{ route('paciente.login') }}" class="btn btn-success">Iniciar sesión</a>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
@stop

@section('js')
    <script> console.log("¡Bienvenido al Sistema de Gestión de Clínica!"); </script>
@stop
