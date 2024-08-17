@extends('adminlte::page')

@section('title', 'Perfil Paciente')

@section('content_header')
    <h1>Perfil - Paciente</h1>
    
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
    <div class="d-flex justify-content-center">
        <div class="card" style="width: 100%; max-width: 600px;">
            <div class="card-header">
                <h3 class="card-title">Información del Paciente</h3>
            </div>
            <div class="card-body">
                <form>
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombres</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Ingrese el nombre del paciente" value="{{ old('name', $paciente->name) }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="surname" class="form-label">Apellidos</label>
                        <input type="text" id="surname" name="surname" class="form-control" placeholder="Ingrese el apellido del paciente" value="{{ old('surname', $paciente->surname) }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Dirección</label>
                        <input type="text" id="address" name="address" class="form-control" placeholder="Ingrese la dirección del paciente" value="{{ old('address', $paciente->address) }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Teléfono</label>
                        <input type="text" id="phone" name="phone" class="form-control" placeholder="Ingrese el teléfono del paciente" value="{{ old('phone', $paciente->phone) }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="dni" class="form-label">DNI</label>
                        <input type="text" id="dni" name="dni" class="form-control" placeholder="Ingrese el DNI del paciente" value="{{ old('dni', $paciente->dni) }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="gender" class="form-label">Género</label>
                        <input type="text" id="gender" name="gender" class="form-control" placeholder="Ingrese el género del paciente" value="{{ old('gender', $paciente->gender == 'M' ? 'Masculino' : 'Femenino') }}" readonly>
                    </div>

                    <div class="d-flex justify-content-between">
                        @if ($historia != null)
                            <a href="{{ route('clinica.pdf', $historia->id) }}" class="btn btn-success btn-sm" target="_blank">Ver Historia</a>
                            <a href="{{ route('paciente.editacion', $paciente->id) }}" class="btn btn-primary">Editar Datos</a>
                            <a href="{{ route('inicio') }}" class="btn btn-danger">Cerrar Sesión</a>
                        @else
                            <a href="{{ route('paciente.editacion', $paciente->id) }}" class="btn btn-primary">Editar Datos</a>
                            <a href="{{ route('inicio') }}" class="btn btn-danger">Cerrar Sesión</a>
                        @endif
                        
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
@stop

@section('js')
    {{-- Add here extra javascript --}}
@stop
