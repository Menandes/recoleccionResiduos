@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle Empresa Recolectora</h1>
    <div class="mb-3">
        <strong>Nombre:</strong> {{ $empresaRecolectora->nombre }}
    </div>
    <div class="mb-3">
        <strong>Dirección:</strong> {{ $empresaRecolectora->direccion }}
    </div>
    <div class="mb-3">
        <strong>Teléfono:</strong> {{ $empresaRecolectora->telefono }}
    </div>
    <a href="{{ route('empresaRecolectora.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('empresaRecolectora.edit', $empresaRecolectora) }}" class="btn btn-warning">Editar</a>
</div>
@endsection