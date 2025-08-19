@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center my-5">
        <div class="card shadow-lg border-0 rounded-4 w-100" style="max-width: 1000px;">

            <!-- Header -->
            <div class="card-header text-white text-center py-4"
                style="background: linear-gradient(135deg, #2E7D32, #43A047); border-top-left-radius: 15px; border-top-right-radius: 15px;">
                <h3 class="mb-1"><i class="fas fa-list"></i> Solicitudes Pendientes</h3>
                <p class="mb-0">Gestión y seguimiento de todas las solicitudes pendientes</p>
            </div>

            <!-- Body -->
            <div class="card-body">

                <!-- Mensajes -->
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                @if($solicitudes->isEmpty())
                    <p class="text-center text-muted">No hay solicitudes pendientes.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle text-center">
                            <thead class="table-success">
                                <tr>
                                    <th>ID</th>
                                    <th>Usuario</th>
                                    <th>Tipo de Residuo</th>
                                    <th>Descripción</th>
                                    <th>Peso (kg)</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($solicitudes as $solicitud)
                                    <tr>
                                        <td>{{ $solicitud->id }}</td>
                                        <td>{{ $solicitud->usuario->name ?? 'Desconocido' }}</td>
                                        <td>{{ $solicitud->tipo_residuo }}</td>
                                        <td>{{ $solicitud->descripcion ?? '-' }}</td>
                                        <td>{{ $solicitud->peso ?? '-' }}</td>
                                        <td>
                                            <span class="badge 
                                                                    @if(strtolower($solicitud->estado) == 'pendiente') bg-warning 
                                                                    @elseif(strtolower($solicitud->estado) == 'en proceso') bg-info 
                                                                    @elseif(strtolower($solicitud->estado) == 'recolectado') bg-success 
                                                                    @else bg-secondary @endif">
                                                {{ ucfirst($solicitud->estado) }}
                                            </span>
                                        </td>
                                        <td>
                                            <!-- Botón Modal -->
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#modal-{{ $solicitud->id }}">
                                                🔍 Ver Detalles
                                            </button>

                                            <!-- Modal Detalle -->
                                            <div class="modal fade" id="modal-{{ $solicitud->id }}" tabindex="-1"
                                                aria-labelledby="modalLabel-{{ $solicitud->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content border-0 shadow-lg rounded-4">

                                                        <!-- Cabecera Modal -->
                                                        <div class="modal-header text-white"
                                                            style="background: linear-gradient(135deg, #2E7D32, #43A047); border-top-left-radius: 15px; border-top-right-radius: 15px;">
                                                            <h5 class="modal-title" id="modalLabel-{{ $solicitud->id }}">
                                                                Solicitud #{{ $solicitud->id }}
                                                            </h5>
                                                            <button type="button" class="btn-close btn-close-white"
                                                                data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                                        </div>

                                                        <!-- Cuerpo Modal -->
                                                        <div class="modal-body text-start">
                                                            <ul class="list-group list-group-flush">
                                                                <li class="list-group-item"><strong>Usuario:</strong>
                                                                    {{ $solicitud->usuario->name ?? 'Desconocido' }}</li>
                                                                <li class="list-group-item"><strong>Tipo de residuo:</strong>
                                                                    {{ $solicitud->tipo_residuo }}</li>
                                                                <li class="list-group-item"><strong>Descripción:</strong>
                                                                    {{ $solicitud->descripcion ?? '-' }}</li>
                                                                <li class="list-group-item"><strong>Peso:</strong>
                                                                    {{ $solicitud->peso ?? '-' }} kg</li>
                                                                <li class="list-group-item"><strong>Estado:</strong>
                                                                    <span class="badge 
                                                    @if(strtolower($solicitud->estado) == 'pendiente') bg-warning 
                                                    @elseif(strtolower($solicitud->estado) == 'en proceso') bg-info 
                                                    @elseif(strtolower($solicitud->estado) == 'recolectado') bg-success 
                                                    @else bg-secondary @endif">
                                                                        {{ ucfirst($solicitud->estado) }}
                                                                    </span>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                        <!-- Footer Modal -->
                                                        <div class="modal-footer">
                                                            @if(strtolower($solicitud->estado) == 'pendiente')
                                                                <form
                                                                    action="{{ route('recolectorSolicitud.completar', $solicitud->id) }}"
                                                                    method="POST" class="d-inline">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-success btn-sm">✔
                                                                        Completar</button>
                                                                </form>
                                                                <form
                                                                    action="{{ route('recolectorSolicitud.cancelar', $solicitud->id) }}"
                                                                    method="POST" class="d-inline">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-danger btn-sm">✖
                                                                        Cancelar</button>
                                                                </form>
                                                            @else
                                                                <span class="text-muted">No disponible</span>
                                                            @endif
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cerrar</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Fin Modal -->
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