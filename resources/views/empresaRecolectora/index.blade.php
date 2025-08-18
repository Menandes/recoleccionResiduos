@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center my-5">
    <div class="card shadow-lg border-0 rounded-4 w-100" style="max-width: 1000px;">

        <!-- Header -->
        <div class="card-header text-white text-center py-4"
             style="background: linear-gradient(135deg, #2E7D32, #43A047); border-top-left-radius: 15px; border-top-right-radius: 15px;">
            <h3 class="mb-1"><i class="fas fa-building"></i> Empresas Recolectoras</h3>
            <p class="mb-0">Gestión de empresas registradas en el sistema</p>
        </div>

        <!-- Body -->
        <div class="card-body p-4">

            <!-- Botón crear -->
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('empresaRecolectora.create') }}" class="btn btn-success">
                    <i class="fas fa-plus-circle"></i> Nueva Empresa
                </a>
            </div>

            <!-- Alertas -->
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <!-- Tabla -->
            @if($empresas->isEmpty())
                <p class="text-center">No hay empresas registradas.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle text-center">
                        <thead class="table-success">
                            <tr>
                                <th><i class="fas fa-building"></i> Nombre</th>
                                <th><i class="fas fa-map-marker-alt"></i> Dirección</th>
                                <th><i class="fas fa-phone"></i> Teléfono</th>
                                <th><i class="fas fa-cogs"></i> Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($empresas as $empresa)
                            <tr>
                                <td>{{ $empresa->nombre }}</td>
                                <td>{{ $empresa->direccion }}</td>
                                <td>{{ $empresa->telefono }}</td>
                                <td>
                                    <a href="{{ route('empresaRecolectora.show', $empresa) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i> Ver
                                    </a>
                                    <a href="{{ route('empresaRecolectora.edit', $empresa) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <form action="{{ route('empresaRecolectora.destroy', $empresa) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar empresa?')">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
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
    .btn-success {
        background: #2E7D32;
        border: none;
    }
    .btn-success:hover {
        background: #43A047;
        transform: translateY(-2px);
    }
    .btn-warning {
        background: #f39c12;
        border: none;
        color: white;
    }
    .btn-warning:hover {
        background: #e67e22;
    }
    .btn-danger {
        background: #e74c3c;
        border: none;
    }
    .btn-danger:hover {
        background: #c0392b;
    }
    .btn-info {
        background: #3498db;
        border: none;
        color: white;
    }
    .btn-info:hover {
        background: #2980b9;
    }
    .table th {
        font-weight: bold;
        color: #1b5e20;
    }
    .table td {
        vertical-align: middle;
    }
</style>
@endsection
