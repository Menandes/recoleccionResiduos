@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center my-5">
    <div class="card shadow-lg border-0 rounded-4 w-100" style="max-width: 800px;">

        <!-- Header -->
        <div class="card-header text-white text-center py-4"
             style="background: linear-gradient(135deg, #2E7D32, #43A047); border-top-left-radius: 15px; border-top-right-radius: 15px;">
            <h3 class="mb-1"><i class="fas fa-file-alt"></i> Detalle de la Solicitud</h3>
            <p class="mb-0">Solicitud #{{ $solicitud->id }}</p>
        </div>

        <!-- Body -->
        <div class="card-body p-4">
            <div class="mb-3">
                <h5 class="fw-bold text-success">
                    <i class="fas fa-recycle"></i> {{ $solicitud->residuo->nombre }}
                    <span class="badge bg-secondary ms-2">{{ $solicitud->residuo->categoria }}</span>
                </h5>
                <p class="text-muted">{{ $solicitud->residuo->descripcion }}</p>
            </div>

            <div class="row mb-2">
                <div class="col-md-5 fw-bold"><i class="fas fa-calendar-alt"></i> Fecha programada:</div>
                <div class="col-md-7">{{ $solicitud->fecha_programada }}</div>
            </div>

            <div class="row mb-2">
                <div class="col-md-5 fw-bold"><i class="fas fa-truck"></i> Tipo de recolección:</div>
                <div class="col-md-7">{{ ucfirst($solicitud->tipo_recoleccion) }}</div>
            </div>
        </div>

        <!-- Footer -->
        <div class="card-footer d-flex justify-content-between bg-light">
            <a href="{{ route('solicitudes.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Volver a la lista
            </a>
            <a href="{{ route('solicitudes.edit', $solicitud) }}" class="btn btn-warning">
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
    .btn-warning {
        background: #f39c12;
        border: none;
        color: white;
    }
    .btn-warning:hover {
        background: #e67e22;
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
