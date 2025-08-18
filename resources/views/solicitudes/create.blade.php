@extends('layouts.app')

@section('content')
<div class="container">
    <div class="header">
        <h1><i class="fas fa-recycle"></i> EcoRecolecta</h1>
        <p>Crear Solicitud de Recolección</p>
    </div>

    <div class="form-container">
        <!-- Errores -->
        @if ($errors->any())
            <div class="alert alert-error">
                <i class="fas fa-exclamation-triangle"></i> Corrige los siguientes errores:
                <ul style="margin: 10px 0 0 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('solicitudes.store') }}" method="POST">
            @csrf

            <!-- Tipo de Residuo -->
            <div class="form-group">
                <label for="residuo_id"><i class="fas fa-dumpster"></i> Tipo de Residuo</label>
                <select name="residuo_id" id="residuo_id" class="form-control" required>
                    <option value="">-- Seleccione un residuo --</option>
                    @foreach ($residuos as $residuo)
                        <option value="{{ $residuo->id }}" {{ old('residuo_id') == $residuo->id ? 'selected' : '' }}>
                            {{ $residuo->nombre }} ({{ $residuo->categoria }})
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Fecha -->
            <div class="form-group">
                <label for="fecha_recoleccion"><i class="fas fa-calendar-day"></i> Fecha de Recolección</label>
                <input type="date" name="fecha_recoleccion" id="fecha_recoleccion" class="form-control" 
                       value="{{ old('fecha_recoleccion') }}" required>
                <small class="peso-help">La fecha debe ser al menos 7 días después de hoy.</small>
            </div>

            <!-- Tipo Residuo Detalle -->
            <div class="form-group">
                <label for="tipo_residuo"><i class="fas fa-tag"></i> Detalle del Tipo de Residuo</label>
                <input type="text" name="tipo_residuo" id="tipo_residuo" class="form-control" 
                       value="{{ old('tipo_residuo') }}" required placeholder="Ej: Plástico, Vidrio, Orgánico...">
            </div>

            <!-- Peso -->
            <div class="form-group">
                <label for="peso"><i class="fas fa-weight-hanging"></i> Peso estimado (kg)</label>
                <div class="peso-input-container">
                    <input type="number" step="0.01" min="0" name="peso" id="peso" class="form-control peso-input" 
                           value="{{ old('peso') }}" placeholder="0.0">
                    <span class="peso-unit">kg</span>
                </div>
                <small class="peso-help">Indica el peso aproximado de los residuos</small>
            </div>

            <!-- Descripción -->
            <div class="form-group">
                <label for="descripcion"><i class="fas fa-align-left"></i> Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control" rows="4"
                          placeholder="Agrega detalles sobre el residuo...">{{ old('descripcion') }}</textarea>
            </div>

            <!-- Estado -->
            <div class="form-group">
                <label for="estado"><i class="fas fa-info-circle"></i> Estado</label>
                <input type="text" name="estado" id="estado" class="form-control" 
                       value="{{ old('estado') }}" placeholder="Ej: Pendiente, Programado, Completado...">
            </div>

            <!-- Botones -->
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Guardar Solicitud
                </button>
                <a href="{{ route('solicitudes.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
</div>

{{-- Importar iconos --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

{{-- Estilos --}}
<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background: linear-gradient(135deg, #2E8B57, #32CD32, #98FB98);
        min-height: 100vh;
        padding: 20px;
    }
    .container {
        max-width: 900px;
        margin: 0 auto;
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        overflow: hidden;
    }
    .header {
        background: linear-gradient(135deg, #4CAF50, #2E7D32);
        color: white;
        padding: 30px;
        text-align: center;
    }
    .header h1 {
        font-size: 2em;
        margin-bottom: 5px;
    }
    .form-container {
        padding: 30px;
    }
    .form-group {
        margin-bottom: 25px;
    }
    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #333;
    }
    .form-control {
        width: 100%;
        padding: 15px;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        font-size: 1em;
        transition: border-color 0.3s ease;
    }
    .form-control:focus {
        outline: none;
        border-color: #4CAF50;
    }
    .peso-input-container {
        position: relative;
    }
    .peso-unit {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #666;
        font-weight: bold;
    }
    .peso-help {
        font-size: 0.85em;
        color: #666;
        margin-top: 5px;
    }
    .btn {
        padding: 12px 20px;
        border-radius: 12px;
        font-size: 1rem;
        font-weight: bold;
        margin: 5px;
        transition: 0.3s ease;
    }
    .btn-primary {
        background: #4CAF50;
        border: none;
        color: white;
    }
    .btn-primary:hover {
        background: #45a049;
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
    .alert-error {
        background: #f8d7da;
        border: 1px solid #f5c6cb;
        color: #721c24;
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 20px;
    }
</style>

{{-- Script para validar fecha mínima --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let fechaInput = document.getElementById("fecha_recoleccion");
        let today = new Date();
        today.setDate(today.getDate() + 7); // sumar 7 días
        let minDate = today.toISOString().split("T")[0];
        fechaInput.setAttribute("min", minDate);
    });
</script>
@endsection
