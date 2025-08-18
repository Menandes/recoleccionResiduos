@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Empresa Recolectora</h1>
    <form action="{{ route('empresaRecolectora.update', $empresaRecolectora) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $empresaRecolectora->nombre }}" required>
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" name="direccion" class="form-control" value="{{ $empresaRecolectora->direccion }}" required>
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="{{ $empresaRecolectora->telefono }}" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('empresaRecolectora.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection