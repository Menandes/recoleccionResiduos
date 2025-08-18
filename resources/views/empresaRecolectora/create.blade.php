@extends('layouts.app')

@section('content')
<div class="container">
    <div class="header">
        <h1><i class="fas fa-industry"></i> Nueva Empresa Recolectora</h1>
        <p>Registra una nueva empresa para la gestión de recolección</p>
    </div>

    <div class="form-container">
        <form action="{{ route('empresaRecolectora.store') }}" method="POST">
            @csrf

            <!-- Nombre -->
            <div class="form-group">
                <label for="nombre"><i class="fas fa-building"></i> Nombre de la Empresa</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" required>
            </div>

            <!-- Dirección -->
            <div class="form-group">
                <label for="direccion"><i class="fas fa-map-marker-alt"></i> Dirección</label>
                <input type="text" name="direccion" id="direccion" class="form-control" value="{{ old('direccion') }}" required>
            </div>

            <!-- Teléfono -->
            <div class="form-group">
                <label for="telefono"><i class="fas fa-phone"></i> Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono') }}" required>
            </div>

            <!-- Botones -->
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Guardar Empresa
                </button>
                <a href="{{ route('empresaRecolectora.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
</div>

{{-- Importar iconos --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

{{-- Estilos --}}
<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background: linear-gradient(135deg, #2E8B57, #32CD32, #98FB98);
        min-height: 100vh;
        padding: 20px;
    }
    .container {
        max-width: 800px;
        margin: 0 auto;
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        overflow: hidden;
    }
    .header {
        background: linear-gradient(135deg, #4CAF50, #2E7D32);
        color: white;
        padding: 30px;
        text-align: center;
    }
    .header h1 {
        font-size: 2em;
        margin-bottom: 5px;
    }
    .header p {
        font-size: 1.1em;
        opacity: 0.9;
    }
    .form-container {
        padding: 30px;
    }
    .form-group {
        margin-bottom: 25px;
    }
    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #333;
    }
    .form-control {
        width: 100%;
        padding: 15px;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        font-size: 1em;
        transition: border-color 0.3s ease;
    }
    .form-control:focus {
        outline: none;
        border-color: #4CAF50;
    }
    .btn {
        padding: 12px 20px;
        border-radius: 12px;
        font-size: 1rem;
        font-weight: bold;
        margin: 5px;
        transition: 0.3s ease;
    }
    .btn-primary {
        background: #4CAF50;
        border: none;
        color: white;
    }
    .btn-primary:hover {
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
