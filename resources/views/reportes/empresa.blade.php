@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center my-5">
    <div class="card shadow-lg border-0 rounded-4 w-100" style="max-width: 1100px;">

        <!-- Header -->
        <div class="card-header text-white text-center py-4"
             style="background: linear-gradient(135deg, #2E7D32, #43A047); border-top-left-radius: 15px; border-top-right-radius: 15px;">
            <h3 class="mb-1"><i class="fas fa-building me-2"></i>Reporte por Empresa</h3>
            <p class="mb-0">Filtra por empresa, tipo de residuo y rango de fechas</p>
        </div>

        <!-- Body -->
        <div class="card-body p-4">

            {{-- Formulario filtros --}}
            <form method="GET" action="{{ route('reportes.empresa') }}" class="mb-4">
                <div class="row g-3 align-items-end">
                    <div class="col-md-3">
                        <label for="empresa_id" class="form-label">Empresa Recolectora</label>
                        <select name="empresa_id" id="empresa_id" class="form-select">
                            <option value="">-- Seleccione una empresa --</option>
                            @foreach ($empresas as $empresa)
                                <option value="{{ $empresa->id }}" {{ (int)$empresaId === $empresa->id ? 'selected' : '' }}>
                                    {{ $empresa->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label for="tipo_residuo" class="form-label">Tipo de Residuo</label>
                        <select name="tipo_residuo" id="tipo_residuo" class="form-select">
                            <option value="">-- Todos --</option>
                            <option value="Fracción orgánica (FO)" {{ $tipoResiduo === 'Fracción orgánica (FO)' ? 'selected' : '' }}>Fracción orgánica (FO)</option>
                            <option value="Fracción vegetal (FV)" {{ $tipoResiduo === 'Fracción vegetal (FV)' ? 'selected' : '' }}>Fracción vegetal (FV)</option>
                            <option value="Residuos de poda" {{ $tipoResiduo === 'Residuos de poda' ? 'selected' : '' }}>Residuos de poda</option>
                            <option value="Inorgánicos reciclables" {{ $tipoResiduo === 'Inorgánicos reciclables' ? 'selected' : '' }}>Inorgánicos reciclables</option>
                            <option value="Peligrosos" {{ $tipoResiduo === 'Peligrosos' ? 'selected' : '' }}>Peligrosos</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label for="desde" class="form-label">Desde</label>
                        <input type="date" name="desde" id="desde" value="{{ $desde ?? '' }}" class="form-control">
                    </div>

                    <div class="col-md-2">
                        <label for="hasta" class="form-label">Hasta</label>
                        <input type="date" name="hasta" id="hasta" value="{{ $hasta ?? '' }}" class="form-control">
                    </div>

                    <div class="col-md-2 d-grid">
                        <button type="submit" class="btn btn-success">Filtrar</button>
                    </div>
                </div>
            </form>

            {{-- Resultados --}}
            @if ($solicitudes->isEmpty())
                <p class="text-center text-muted">No se encontraron registros para los filtros seleccionados.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle text-center">
                        <thead class="table-success">
                            <tr>
                                <th>ID</th>
                                <th>Fecha de Recolección</th>
                                <th>Empresa</th>
                                <th>Tipo de Residuo</th>
                                <th>Peso (kg)</th>
                                <th>Estado</th>
                                <th>Descripción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($solicitudes as $solicitud)
                                <tr>
                                    <td>{{ $solicitud->id }}</td>
                                    <td>{{ $solicitud->fecha_recoleccion->format('d/m/Y') }}</td>
                                    <td>{{ $solicitud->empresaRecolectora->nombre ?? 'N/A' }}</td>
                                    <td>{{ $solicitud->tipo_residuo }}</td>
                                    <td>{{ number_format($solicitud->peso ?? 0, 2) }}</td>
                                    <td>{{ ucfirst($solicitud->estado) }}</td>
                                    <td>{{ $solicitud->descripcion ?? '-' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Totales por tipo de residuo --}}
                <h5 class="mt-4 text-success">Totales por Tipo de Residuo (kg)</h5>
                <ul class="list-group w-50">
                    @foreach ($totalesPorTipo as $tipo => $peso)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $tipo }}
                            <span class="badge bg-success rounded-pill">{{ number_format($peso, 2) }}</span>
                        </li>
                    @endforeach
                </ul>
            @endif

        </div>
    </div>
</div>

{{-- Estilos personalizados --}}
<style>
    body {
        background-color: #f4f6f9;
    }
    .btn-success {
        background: #2E7D32;
        border: none;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }
    .btn-success:hover {
        background: #43A047;
        transform: translateY(-2px);
    }
    .table-success th {
        background-color: #2E7D32 !important;
        color: white !important;
        font-weight: 600;
    }
    .list-group-item {
        font-weight: 500;
    }
</style>
@endsection
