@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Solicitud de Recolección</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('solicitudes.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="residuo_id" class="form-label">Tipo de Residuo</label>
            <select name="residuo_id" id="residuo_id" class="form-select" required>
                <option value="">-- Seleccione un residuo --</option>
                @foreach ($residuos as $residuo)
                    <option value="{{ $residuo->id }}" {{ old('residuo_id') == $residuo->id ? 'selected' : '' }}>
                        {{ $residuo->nombre }} ({{ $residuo->categoria }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha_recoleccion" class="form-label">Fecha de Recolección</label>
            <input type="date" name="fecha_recoleccion" id="fecha_recoleccion" class="form-control" value="{{ old('fecha_recoleccion') }}" required>
        </div>

        <div class="mb-3">
            <label for="tipo_residuo" class="form-label">Tipo Residuo (detalles)</label>
            <input type="text" name="tipo_residuo" id="tipo_residuo" class="form-control" value="{{ old('tipo_residuo') }}" required>
        </div>

        <div class="mb-3">
            <label for="peso" class="form-label">Peso (kg)</label>
            <input type="number" step="0.01" name="peso" id="peso" class="form-control" value="{{ old('peso') }}">
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <input type="text" name="estado" id="estado" class="form-control" value="{{ old('estado') }}">
        </div>

        <button type="submit" class="btn btn-primary">Guardar Solicitud</button>
        <a href="{{ route('solicitudes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
