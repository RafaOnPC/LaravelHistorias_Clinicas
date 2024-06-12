@extends('adminlte::page')

@section('title', 'Clínica XYZ - Inicio')

@section('content_header')
    <h1>Bienvenido a la Clínica Medic</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card bg-light">
                <div class="card-body">
                    <h2 class="card-title">Nuestra Misión</h2>
                    <p class="card-text">Proveer atención médica de calidad con un equipo de profesionales dedicados al bienestar de nuestros pacientes.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-4">
            <div class="card bg-info">
                <div class="card-body">
                    <h3 class="card-title">Servicios</h3>
                    <br>
                    <ul>
                        <li>Cardiología</li>
                        <li>Pediatría</li>
                        <li>Dermatología</li>
                        <li>Odontología</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card bg-warning">
                <div class="card-body">
                    <h3 class="card-title">Nuestros Doctores</h3>
                    <br>
                    <ul>
                        <li>Dr. Juan Pérez</li>
                        <li>Dr. María López</li>
                        <li>Dra. Ana Gómez</li>
                        <li>Dr. Pedro Rodríguez</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card bg-success">
                <div class="card-body">
                    <h3 class="card-title">Testimonios</h3>
                    <br>
                    <p>"Excelente atención y profesionales de primera."</p>
                    <p>"Recomiendo la clínica por su calidez humana y eficiencia."</p>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    <link rel="stylesheet" href="/css/custom.css">
@stop

@section('js')
    <script> console.log("Bienvenido a la Clínica XYZ"); </script>
@stop
