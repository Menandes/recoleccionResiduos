@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center my-5">
    <div class="card shadow-lg border-0 rounded-4 w-100" style="max-width: 800px;">

        <!-- Header -->
        <div class="card-header text-white text-center py-4"
             style="background: linear-gradient(135deg, #2E7D32, #43A047); border-top-left-radius: 15px; border-top-right-radius: 15px;">
            <h3 class="mb-1"><i class="fas fa-plus-circle"></i> Crear Solicitud de Recolección</h3>
            <p class="mb-0">Complete la información para registrar una nueva solicitud</p>
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

            <form action="{{ route('solicitudes.store') }}" method="POST">
                @csrf
        <form action="{{ route('solicitudes.store') }}" method="POST">
            @csrf


          <!-- Tipo de Residuo -->
            <div class="mb-3">
                <label for="tipo_residuo" class="form-label fw-bold">
                    <i class="fas fa-dumpster"></i> Tipo de Residuo
                </label>
                <select name="tipo_residuo" id="tipo_residuo" class="form-control" required>
                    <option value="">-- Seleccione una categoría --</option>
                    <option value="Residuo Orgánico">Residuo Orgánico</option>
                    <option value="Residuo Inorgánico">Residuo Inorgánico</option>
                    <option value="Residuo Peligroso">Residuo Peligroso</option>
                </select>
            </div>

            <!-- Detalle del Residuo (Nombre) -->
            <div class="mb-3">
                <label for="residuo_id" class="form-label fw-bold">
                    <i class="fas fa-tag"></i> Detalle del Tipo de Residuo
                </label>
                <select name="residuo_id" id="residuo_id" class="form-control" required>
                    <option value="">-- Seleccione un residuo --</option>

                    @foreach ($residuos as $residuo)
                        <option value="{{ $residuo->id }}" data-categoria="{{ $residuo->categoria }}">
                            {{ $residuo->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
               
                <!-- Fecha de Recolección -->
                <div class="mb-3">
                    <label for="fecha_recoleccion" class="form-label fw-bold"><i class="fas fa-calendar-alt"></i> Fecha de Recolección</label>
                    <input type="date" name="fecha_recoleccion" id="fecha_recoleccion"
                           class="form-control"
                           value="{{ old('fecha_recoleccion') }}"
                           min="{{ \Carbon\Carbon::now()->addWeek()->format('Y-m-d') }}" required>
                </div>
               
                <!-- Peso -->
                <div class="mb-3">
                    <label for="peso" class="form-label fw-bold"><i class="fas fa-weight-hanging"></i> Peso (kg)</label>
                    <input type="number" step="0.01" name="peso" id="peso"
                           class="form-control" value="{{ old('peso') }}">
                </div>

                <!-- Descripción -->
                <div class="mb-3">
                    <label for="descripcion" class="form-label fw-bold"><i class="fas fa-align-left"></i> Descripción</label>
                    <textarea name="descripcion" id="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
                </div>

                <!-- Estado (predefinido en proceso) -->
                <div class="mb-3">
                    <label for="estado" class="form-label fw-bold"><i class="fas fa-tasks"></i> Estado</label>
                    <input type="text" name="estado" id="estado" class="form-control bg-light"
                           value="En proceso" readonly>
                </div>

                <!-- Botones -->
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('solicitudes.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Guardar Solicitud
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

{{-- Script para seleccionar categoria y nombre de residuo --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const categoriaSelect = document.getElementById('tipo_residuo');
        const residuoSelect = document.getElementById('residuo_id');

        const allOptions = Array.from(residuoSelect.options);

        categoriaSelect.addEventListener('change', function () {
            const selectedCategoria = this.value;

            // Limpiar opciones actuales
            residuoSelect.innerHTML = '<option value="">-- Seleccione un residuo --</option>';

            // Filtrar las opciones por categoría
            allOptions.forEach(option => {
                const categoria = option.getAttribute('data-categoria');
                if (categoria === selectedCategoria) {
                    residuoSelect.appendChild(option.cloneNode(true));
                }
            });
        });
    });
</script>




@endsection
