@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center my-5">
    <div class="card shadow-lg border-0 rounded-4 w-100" style="max-width: 700px;">

        <!-- Header -->
        <div class="card-header text-white text-center py-4"
             style="background: linear-gradient(135deg, #1565C0, #1E88E5); border-top-left-radius: 15px; border-top-right-radius: 15px;">
            <h3 class="mb-1"><i class="fas fa-user"></i> Detalle del Recolector</h3>
            <p class="mb-0">Información completa del recolector seleccionado</p>
        </div>

        <!-- Body -->
        <div class="card-body p-4">
            <div class="mb-3">
                <strong>👤 Usuario:</strong> {{ $recolector->nombre ?? '-' }}
            </div>
            <div class="mb-3">
                <strong>🏢 Empresa Recolectora:</strong> {{ $recolector->empresaRecolectora->nombre ?? '-' }}
            </div>
            <div class="mb-3">
                <strong>🆔 Número Documento:</strong> {{ $recolector->numero_documento }}
            </div>
            <div class="mb-3">
                <strong>📞 Teléfono:</strong> {{ $recolector->telefono }}
            </div>
        </div>

        <!-- Footer -->
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('recolectores.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
            <a href="{{ route('recolectores.edit', $recolector) }}" class="btn btn-warning">
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
    .card {
        border-radius: 15px;
    }
    .card-body strong {
        color: #1565C0;
    }
    .btn-warning {
        background: #f39c12;
        border: none;
        font-weight: bold;
        border-radius: 10px;
    }
    .btn-warning:hover {
        background: #e67e22;
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
