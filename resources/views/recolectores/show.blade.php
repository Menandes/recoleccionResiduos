@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle Recolector</h1>
    <div class="mb-3">
        <strong>Usuario:</strong> {{ $recolector->nombre ?? '-' }}
    </div>
    <div class="mb-3">
        <strong>Empresa Recolectora:</strong> {{ $recolector->empresaRecolectora->nombre ?? '-' }}
    </div>
    <div class="mb-3">
        <strong>Número Documento:</strong> {{ $recolector->numero_documento }}
    </div>
    <div class="mb-3">
        <strong>Teléfono:</strong> {{ $recolector->telefono }}
    </div>
    <a href="{{ route('recolectores.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('recolectores.edit', $recolector) }}" class="btn btn-warning">Editar</a>
</div>
@endsection