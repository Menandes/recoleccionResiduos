@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center my-5">
    <div class="card shadow-lg border-0 rounded-4 w-100" style="max-width: 700px;">
        <!-- Header con degradado -->
        <div class="card-header text-white text-center py-4"
            style="background: linear-gradient(135deg, #2E7D32, #43A047); border-top-left-radius: 15px; border-top-right-radius: 15px;">
            <h3 class="mb-1"><i class="fas fa-user-plus"></i> Crear Nuevo Usuario</h3>
            <p class="mb-0">Agrega un nuevo usuario al sistema</p>
        </div>

        <!-- Formulario -->
        <div class="card-body">
            <form method="POST" action="{{ route('users.store') }}">
                @csrf

                <!-- Nombre -->
                <div class="form-group mb-3">
                    <label for="name" class="form-label"><i class="fas fa-user"></i> Nombre</label>
                    <input type="text" 
                           class="form-control @error('name') is-invalid @enderror" 
                           id="name" name="name" 
                           value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-group mb-3">
                    <label for="email" class="form-label"><i class="fas fa-envelope"></i> Email</label>
                    <input type="email" 
                           class="form-control @error('email') is-invalid @enderror" 
                           id="email" name="email" 
                           value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Contraseña -->
                <div class="form-group mb-3">
                    <label for="password" class="form-label"><i class="fas fa-lock"></i> Contraseña</label>
                    <input type="password" 
                           class="form-control @error('password') is-invalid @enderror" 
                           id="password" name="password" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirmar Contraseña -->
                <div class="form-group mb-4">
                    <label for="password_confirmation" class="form-label"><i class="fas fa-check-circle"></i> Confirmar Contraseña</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>

                <!-- Botones -->
                <div class="d-flex justify-content-between">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Crear Usuario
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Importar iconos --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

{{-- Estilos --}}
<style>
    body {
        background-color: #f4f6f9; /* gris claro para que combine con las otras vistas */
    }
    .form-label {
        font-weight: 600;
        color: #333;
    }
    .form-control {
        border-radius: 10px;
        padding: 10px;
        border: 2px solid #e0e0e0;
        transition: border-color 0.3s ease;
    }
    .form-control:focus {
        border-color: #4CAF50;
        outline: none;
        box-shadow: none;
    }
    .btn {
        border-radius: 10px;
        font-weight: bold;
        padding: 10px 18px;
        transition: transform 0.2s ease;
    }
    .btn i {
        margin-right: 6px;
    }
    .btn-success {
        background: #2E8B57;
        border: none;
        color: white;
    }
    .btn-success:hover {
        background: #45a049;
        transform: translateY(-2px);
    }
    .btn-secondary {
        background: #7f8c8d;
        border: none;
        color: white;
    }
    .btn-secondary:hover {
        background: #95a5a6;
    }
</style>
@endsection
