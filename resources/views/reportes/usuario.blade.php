@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center my-5">
    <div class="card shadow-lg border-0 rounded-4 w-100" style="max-width: 1000px;">
        
        <!-- Header -->
        <div class="card-header text-white text-center py-4"
             style="background: linear-gradient(135deg, #2E7D32, #43A047); border-top-left-radius: 15px; border-top-right-radius: 15px;">
            <h3 class="mb-1"><i class="fas fa-chart-line"></i> Reporte de Recolecciones</h3>
        </div>

        <!-- Body -->
        <div class="card-body p-4">
            <!-- Formulario de filtros -->
            <form method="GET" class="row g-3 mb-4">
                <div class="col-md-4">
                    <label for="desde" class="form-label fw-bold">Desde</label>
                    <input type="date" name="desde" id="desde" class="form-control" value="{{ $desde }}">
                </div>
                <div class="col-md-4">
                    <label for="hasta" class="form-label fw-bold">Hasta</label>
                    <input type="date" name="hasta" id="hasta" class="form-control" value="{{ $hasta }}">
                </div>
                <div class="col-md-4 align-self-end d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-search"></i> Filtrar
                    </button>
                </div>
            </form>

            <!-- Tabla -->
            @if ($recolecciones->isEmpty())
                <p class="text-center text-muted">No se encontraron registros para los filtros seleccionados.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle text-center">
                        <thead class="table-success">
                            <tr>
                                <th><i class="fas fa-calendar-alt"></i> Fecha</th>
                                <th><i class="fas fa-dumpster"></i> Tipo de Residuo</th>
                                <th><i class="fas fa-weight"></i> Peso (Kg)</th>
                                <th><i class="fas fa-tasks"></i> Estado</th>
                                <th><i class="fas fa-star"></i> Puntos</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recolecciones as $r)
                                <tr>
                                    <td>{{ $r->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $r->tipo_residuo }}</td>
                                    <td>{{ $r->peso ?? 'N/A' }}</td>
                                    <td>{{ ucfirst($r->estado) }}</td>
                                    <td>{{ $r->puntos }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <h5 class="mt-4 text-end">Total de puntos ganados: <strong>{{ $totalPuntos }}</strong></h5>
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
    .table th {
        font-weight: bold;
        color: #1b5e20;
    }
    .table td {
        vertical-align: middle;
    }
</style>
@endsection
