@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center my-5">
    <div class="card shadow-lg border-0 rounded-4 w-100" style="max-width: 800px;">

        <!-- Header -->
        <div class="card-header text-white text-center py-4"
             style="background: linear-gradient(135deg, #2E7D32, #43A047); border-top-left-radius: 15px; border-top-right-radius: 15px;">
            <h3 class="mb-1"><i class="fas fa-edit"></i> Editar Solicitud de Recolección</h3>
            <p class="mb-0">Modifica la información de la solicitud seleccionada</p>
        </div>

        <!-- Body -->
        <div class="card-body p-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('solicitudes.update', $solicitud->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Tipo de Residuo -->
                <div class="mb-3">
                    <label for="residuo_id" class="form-label fw-bold"><i class="fas fa-recycle"></i> Tipo de Residuo</label>
                    <select name="residuo_id" id="residuo_id" class="form-select" required>
                        @foreach ($residuos as $residuo)
                            <option value="{{ $residuo->id }}" {{ old('residuo_id', $solicitud->residuo_id) == $residuo->id ? 'selected' : '' }}>
                                {{ $residuo->nombre }} ({{ $residuo->categoria }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Fecha de Recolección -->
                <div class="mb-3">
                    <label for="fecha_recoleccion" class="form-label fw-bold"><i class="fas fa-calendar-alt"></i> Fecha de Recolección</label>
                    <input type="date" name="fecha_recoleccion" id="fecha_recoleccion"
                           class="form-control"
                           value="{{ old('fecha_recoleccion', $solicitud->fecha_recoleccion) }}" required>
                </div>

                <!-- Tipo Residuo (detalles) -->
                <div class="mb-3">
                    <label for="tipo_residuo" class="form-label fw-bold"><i class="fas fa-info-circle"></i> Tipo Residuo (detalles)</label>
                    <input type="text" name="tipo_residuo" id="tipo_residuo"
                           class="form-control"
                           value="{{ old('tipo_residuo', $solicitud->tipo_residuo) }}" required>
                </div>

                <!-- Peso -->
                <div class="mb-3">
                    <label for="peso" class="form-label fw-bold"><i class="fas fa-weight-hanging"></i> Peso (kg)</label>
                    <input type="number" step="0.01" name="peso" id="peso"
                           class="form-control"
                           value="{{ old('peso', $solicitud->peso) }}">
                </div>

                <!-- Descripción -->
                <div class="mb-3">
                    <label for="descripcion" class="form-label fw-bold"><i class="fas fa-align-left"></i> Descripción</label>
                    <textarea name="descripcion" id="descripcion" class="form-control">{{ old('descripcion', $solicitud->descripcion) }}</textarea>
                </div>

                <!-- Estado -->
                <div class="mb-3">
                    <label for="estado" class="form-label fw-bold"><i class="fas fa-tasks"></i> Estado</label>
                    <input type="text" name="estado" id="estado"
                           class="form-control"
                           value="{{ old('estado', $solicitud->estado) }}">
                </div>

                <!-- Botones -->
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('solicitudes.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Actualizar Solicitud
                    </button>
                </div>
            </form>
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
    .form-control, .form-select {
        border-radius: 10px;
        padding: 10px;
        border: 2px solid #e0e0e0;
        transition: border-color 0.3s ease;
    }
    .form-control:focus, .form-select:focus {
        border-color: #2E7D32;
        box-shadow: none;
    }
    .btn-success {
        background: #2E7D32;
        border: none;
        color: white;
    }
    .btn-success:hover {
        background: #43A047;
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
