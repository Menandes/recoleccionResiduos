@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nuevo Recolector</h1>
    <form action="{{ route('recolectores.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="empresa_recolectora_id" class="form-label">Empresa Recolectora</label>
            <select name="empresa_recolectora_id" class="form-control" required>
                <option value="">Seleccione empresa</option>
                @foreach($empresas as $empresa)
                    <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="numero_documento" class="form-label">Número Documento</label>
            <input type="text" name="numero_documento" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" name="telefono" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('recolectores.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection