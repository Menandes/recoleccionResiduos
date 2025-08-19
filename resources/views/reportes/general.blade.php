@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center my-5">
    <div class="card shadow-lg border-0 rounded-4 w-100" style="max-width: 1000px;">

        <!-- Encabezado -->
        <div class="card-header text-white text-center py-4"
             style="background: linear-gradient(135deg, #2E7D32, #43A047); border-top-left-radius: 15px; border-top-right-radius: 15px;">
            <h3><i class="fas fa-chart-pie me-2"></i> Reporte General de Usuarios</h3>
        </div>

        <!-- Cuerpo -->
        <div class="card-body p-4">
            <!-- Filtros -->
            <form method="GET" action="{{ route('reportes.general') }}" class="row g-3 mb-4">
                <div class="col-md-4">
                    <label for="desde" class="form-label fw-bold"><i class="fas fa-calendar-alt"></i> Desde</label>
                    <input type="date" name="desde" id="desde" class="form-control" value="{{ $desde ?? '' }}">
                </div>
                <div class="col-md-4">
                    <label for="hasta" class="form-label fw-bold"><i class="fas fa-calendar-alt"></i> Hasta</label>
                    <input type="date" name="hasta" id="hasta" class="form-control" value="{{ $hasta ?? '' }}">
                </div>
                <div class="col-md-4">
                    <label for="localidad" class="form-label fw-bold"><i class="fas fa-map-marker-alt"></i> Localidad</label>
                    <input type="text" name="localidad" id="localidad" class="form-control" value="{{ $localidad ?? '' }}" placeholder="Ej: Barrio X">
                </div>
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success mt-2">
                        <i class="fas fa-search"></i> Filtrar
                    </button>
                </div>
            </form>

            <!-- Resultados -->
            @if(isset($totalesPorTipo) && $totalesPorTipo->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover text-center align-middle">
                        <thead class="table-success">
                            <tr>
                                <th><i class="fas fa-recycle"></i> Tipo de Residuo</th>
                                <th><i class="fas fa-weight-hanging"></i> Total Peso (kg)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($totalesPorTipo as $tipo => $peso)
                                <tr>
                                    <td>{{ $tipo }}</td>
                                    <td>{{ number_format($peso, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-center text-muted">No se encontraron registros para los filtros seleccionados.</p>
            @endif
        </div>
    </div>
</div>

{{-- Iconos --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

{{-- Estilos personalizados --}}
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
    .table th {
        font-weight: bold;
        color: #1b5e20;
    }
    .table td {
        vertical-align: middle;
    }
</style>
@endsection
