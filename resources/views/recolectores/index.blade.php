@extends('layouts.app')

@section('content')
<div class="container my-5">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary"><i class="fas fa-users"></i> Recolectores</h1>
        <a href="{{ route('recolectores.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Nuevo Recolector
        </a>
    </div>

    <!-- Alertas -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    <!-- Tabla -->
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="text-white" style="background: linear-gradient(135deg, #1565C0, #1E88E5);">
                        <tr>
                            <th scope="col">👤 Usuario</th>
                            <th scope="col">🏢 Empresa</th>
                            <th scope="col">🆔 Documento</th>
                            <th scope="col">📞 Teléfono</th>
                            <th scope="col" class="text-center">⚙️ Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recolectores as $recolector)
                            <tr>
                                <td>{{ $recolector->nombre ?? '-' }}</td>
                                <td>{{ $recolector->empresaRecolectora->nombre ?? '-' }}</td>
                                <td>{{ $recolector->numero_documento }}</td>
                                <td>{{ $recolector->telefono }}</td>
                                <td class="text-center">
                                    <a href="{{ route('recolectores.show', $recolector) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('recolectores.edit', $recolector) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('recolectores.destroy', $recolector) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar recolector?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-3">
                                    <i class="fas fa-info-circle"></i> No hay recolectores registrados.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
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
    .table th {
        font-weight: 600;
    }
    .table td {
        vertical-align: middle;
    }
    .btn {
        border-radius: 8px;
        font-weight: bold;
    }
    .btn-info {
        background: #17a2b8;
        border: none;
    }
    .btn-info:hover {
        background: #138496;
    }
    .btn-warning {
        background: #f39c12;
        border: none;
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
    .btn-success {
        background: #2ecc71;
        border: none;
    }
    .btn-success:hover {
        background: #27ae60;
    }
</style>
@endsection
