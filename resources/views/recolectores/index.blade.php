@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center my-5">
        <div class="card shadow-lg border-0 rounded-4 w-100" style="max-width: 1000px;">
            <!-- Header -->
            <div class="card-header text-white text-center py-4"
                 style="background: linear-gradient(135deg, #2E7D32, #43A047); border-top-left-radius: 15px; border-top-right-radius: 15px;">
                <h3 class="mb-1"><i class="fas fa-users"></i> Recolectores</h3>
                <p class="mb-0">Gestión de recolectores</p>
            </div>

            <!-- Body -->
            <div class="card-body p-4">
                <!-- Botón crear -->
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('recolectores.create') }}" class="btn btn-success">
                        <i class="fas fa-plus-circle"></i> Nuevo Recolector
                    </a>
                </div>

                <!-- Alertas -->
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <!-- Tabla / Vacío -->
                @if($recolectores->isEmpty())
                    <p class="text-center">No hay recolectores registrados.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle text-center">
                            <thead class="table-success">
                            <tr>
                                <th scope="col">
                                    <i class="fas fa-user th-ico"></i> Usuario
                                </th>
                                <th scope="col">
                                    <i class="fas fa-building th-ico"></i> Empresa
                                </th>
                                <th scope="col">
                                    <i class="fas fa-id-badge th-ico"></i> Documento
                                </th>
                                <th scope="col">
                                    <i class="fas fa-phone th-ico"></i> Teléfono
                                </th>
                                <th scope="col" class="text-center">
                                    <i class="fas fa-cogs th-ico"></i> Acciones
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($recolectores as $recolector)
                                <tr>
                                    <td>{{ $recolector->nombre ?? '-' }}</td>
                                    <td>{{ $recolector->empresaRecolectora?->nombre ?? '-' }}</td>
                                    <td>{{ $recolector->numero_documento ?? '-' }}</td>
                                    <td>{{ $recolector->telefono ?? '-' }}</td>
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
        :root { --brand-green: #2E7D32; } /* mismo verde del header */

        .table thead th { color: #1b5e20; font-weight: bold; } /* como ya lo tenías */
        .table thead th .th-ico{
            color: var(--brand-green);
            margin-right: .4rem;
            font-size: 1.05rem;
            vertical-align: -2px;
        }
        body { background-color: #f4f6f9; }
        .card { border-radius: 15px; }
        .table th { font-weight: bold; color: #1b5e20; }
        .table td { vertical-align: middle; }
        .btn { border-radius: 8px; font-weight: bold; }
        .btn-info { background: #3498db; border: none; color: white; }
        .btn-info:hover { background: #2980b9; }
        .btn-warning { background: #f39c12; border: none; color: white; }
        .btn-warning:hover { background: #e67e22; }
        .btn-danger { background: #e74c3c; border: none; }
        .btn-danger:hover { background: #c0392b; }
        .btn-success { background: #2E7D32; border: none; }
        .btn-success:hover { background: #43A047; transform: translateY(-2px); }
    </style>
@endsection
