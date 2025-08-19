@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center my-5">
    <div class="card shadow-lg border-0 rounded-4 w-100" style="max-width: 700px;">

        <!-- Header -->
        <div class="card-header text-white text-center py-4"
             style="background: linear-gradient(135deg, #2E7D32, #43A047); border-top-left-radius: 15px; border-top-right-radius: 15px;">
            <h3 class="mb-1"><i class="fas fa-edit"></i> Editar Empresa Recolectora</h3>
            <p class="mb-0">Modifica la información de la empresa seleccionada</p>
        </div>

        <!-- Formulario -->
        <div class="card-body p-4">
            <form action="{{ route('empresaRecolectora.update', $empresaRecolectora) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Nombre -->
                <div class="mb-3">
                    <label for="nombre" class="form-label"><i class="fas fa-building"></i> Nombre</label>
                    <input type="text" name="nombre" id="nombre"
                           class="form-control @error('nombre') is-invalid @enderror"
                           value="{{ old('nombre', $empresaRecolectora->nombre) }}" required>
                    @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Dirección -->
                <div class="mb-3">
                    <label for="direccion" class="form-label"><i class="fas fa-map-marker-alt"></i> Dirección</label>
                    <input type="text" name="direccion" id="direccion"
                           class="form-control @error('direccion') is-invalid @enderror"
                           value="{{ old('direccion', $empresaRecolectora->direccion) }}" required>
                    @error('direccion')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Teléfono -->
                <div class="mb-3">
                    <label for="telefono" class="form-label"><i class="fas fa-phone"></i> Teléfono</label>
                    <input type="text" name="telefono" id="telefono"
                           class="form-control @error('telefono') is-invalid @enderror"
                           value="{{ old('telefono', $empresaRecolectora->telefono) }}" required>
                    @error('telefono')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Botones -->
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('empresaRecolectora.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Iconos --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

{{-- Estilos --}}
<style>
    body {
        background-color: #f4f6f9;
    }
    .form-label {
        font-weight: 600;
        color: #2E7D32;
    }
    .form-control {
        border-radius: 10px;
        padding: 12px;
        border: 2px solid #e0e0e0;
        transition: border-color 0.3s ease;
    }
    .form-control:focus {
        border-color: #2E7D32;
        box-shadow: none;
    }
    .btn-success {
        background: #2E7D32;
        border: none;
        font-weight: bold;
        padding: 10px 18px;
        border-radius: 10px;
    }
    .btn-success:hover {
        background: #1b5e20;
    }
    .btn-secondary {
        background: #7f8c8d;
        border: none;
        font-weight: bold;
        border-radius: 10px;
    }
    .btn-secondary:hover {
        background: #95a5a6;
    }
</style>
@endsection
