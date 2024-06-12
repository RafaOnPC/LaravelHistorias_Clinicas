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
                    <p>Regístrate como usuario para acceder a todas las funcionalidades del sistema.</p>
                    <p>Si ya tienes una cuenta, inicia sesión para continuar.</p>
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
