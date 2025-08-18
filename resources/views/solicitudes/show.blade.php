@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Detalle de la Solicitud</h1>

    <div class="card">
        <div class="card-header">
            Solicitud #{{ $solicitud->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $solicitud->residuo->nombre }} ({{ $solicitud->residuo->categoria }})</h5>
            <p class="card-text"><strong>Descripción del residuo:</strong> {{ $solicitud->residuo->descripcion }}</p>
            <p class="card-text"><strong>Fecha programada:</strong> {{ $solicitud->fecha_programada }}</p>
            <p class="card-text"><strong>Tipo de recolección:</strong> {{ ucfirst($solicitud->tipo_recoleccion) }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('solicitudes.edit', $solicitud) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('solicitudes.index') }}" class="btn btn-secondary">Volver a la lista</a>
        </div>
    </div>
</div>
@endsection
