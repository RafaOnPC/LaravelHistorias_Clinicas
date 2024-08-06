<!-- resources/views/paciente/login.blade.php -->
@extends('adminlte::page')

@section('title', 'Login Paciente')

@section('content_header')
    <h1 class="text-center">Inicio de Sesión - Afiliado</h1><br>
    <div class="d-flex justify-content-center">
        <img src="https://seeklogo.com/images/E/estrella-de-la-vida-logo-C4736942A0-seeklogo.com.png" alt="Ambulancia" class="img-fluid" style="max-height: 200px;">
    </div>
@stop

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: calc(100vh - 100px);">
        <div class="login-box">
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Inicia sesión para continuar</p>
                    <form action="{{ route('paciente.storing') }}" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Correo electrónico" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-2">
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                            </div>
                        </div>
                    </form>

                    <!-- If there are errors, display them here -->
                    @if ($errors->any())
                        <div class="alert alert-danger mt-3">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>
                <!-- /.login-card-body -->
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
