@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center my-5">
    <div class="card shadow-lg border-0 rounded-4 w-100" style="max-width: 1000px;">
        
        <!-- Header -->
        <div class="card-header text-white text-center py-4"
            style="background: linear-gradient(135deg, #2E7D32, #43A047); border-top-left-radius: 15px; border-top-right-radius: 15px;">
            <h3 class="mb-1"><i class="fas fa-list"></i> Listado de Solicitudes</h3>
            <p class="mb-0">Gestión y seguimiento de todas las solicitudes registradas</p>
        </div>

        <!-- Body -->
        <div class="card-body">
            <!-- Botón Crear -->
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('solicitudes.create') }}" class="btn btn-success">
                    <i class="fas fa-plus"></i> Crear nueva solicitud
                </a>
            </div>

            <!-- Mensajes -->
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <!-- Tabla -->
            @if($solicitudes->isEmpty())
                <p class="text-center text-muted">No hay solicitudes registradas.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle text-center">
                        <thead class="table-success">
                            <tr>
                                <th>Residuo</th>
                                <th>Fecha de Recolección</th>
                                <th>Tipo de Residuo</th>
                                <th>Peso (kg)</th>
                                <th>Descripción</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($solicitudes as $solicitud)
                                <tr>
                                    <td>{{ $solicitud->residuo->nombre ?? 'Sin residuo' }}</td>
                                    <td>{{ $solicitud->fecha_recoleccion }}</td>
                                    <td>{{ $solicitud->tipo_residuo }}</td>
                                    <td>{{ $solicitud->peso ?? '-' }}</td>
                                    <td>{{ $solicitud->descripcion ?? '-' }}</td>
                                    <td>
                                        <span class="badge 
                                            @if($solicitud->estado == 'En proceso') bg-warning 
                                            @elseif($solicitud->estado == 'Completado') bg-success 
                                            @else bg-secondary @endif">
                                            {{ $solicitud->estado ?? 'Pendiente' }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('solicitudes.edit', $solicitud) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <form action="{{ route('solicitudes.destroy', $solicitud) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('¿Estás seguro de eliminar esta solicitud?')">
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
        background: #2E8B57;
        border: none;
    }
    .btn-success:hover {
        background: #45a049;
        transform: translateY(-2px);
    }
    .table th {
        color: #2E7D32;
        font-weight: 600;
    }
    .badge {
        padding: 6px 12px;
        border-radius: 8px;
        font-size: 0.9em;
    }
</style>
@endsection
