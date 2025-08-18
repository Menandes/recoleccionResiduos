@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center my-5">
    <div class="card shadow-lg border-0 rounded-4 w-100" style="max-width: 700px;">

        <!-- Header -->
        <div class="card-header text-white text-center py-4"
             style="background: linear-gradient(135deg, #2E7D32, #43A047); border-top-left-radius: 15px; border-top-right-radius: 15px;">
            <h3 class="mb-1"><i class="fas fa-building"></i> Detalle de la Empresa</h3>
            <p class="mb-0">Información completa de la empresa recolectora</p>
        </div>

        <!-- Body -->
        <div class="card-body p-4">
            <div class="row mb-3">
                <div class="col-md-4 fw-bold"><i class="fas fa-building"></i> Nombre:</div>
                <div class="col-md-8">{{ $empresaRecolectora->nombre }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 fw-bold"><i class="fas fa-map-marker-alt"></i> Dirección:</div>
                <div class="col-md-8">{{ $empresaRecolectora->direccion }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 fw-bold"><i class="fas fa-phone"></i> Teléfono:</div>
                <div class="col-md-8">{{ $empresaRecolectora->telefono }}</div>
            </div>
        </div>

        <!-- Footer -->
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('empresaRecolectora.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
            <a href="{{ route('empresaRecolectora.edit', $empresaRecolectora) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Editar
            </a>
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
    .fw-bold {
        color: #2E7D32;
    }
    .btn-warning {
        background: #f39c12;
        border: none;
        color: white;
    }
    .btn-warning:hover {
        background: #e67e22;
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
