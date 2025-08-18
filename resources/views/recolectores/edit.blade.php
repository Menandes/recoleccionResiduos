@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Recolector</h1>
    <form action="{{ route('recolectores.update', $recolector) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="user_id" class="form-label">Usuario</label>
            <select name="user_id" class="form-control" required>
                <option value="">Seleccione usuario</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ $recolector->user_id == $usuario->id ? 'selected' : '' }}>
                        {{ $usuario->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="empresa_recolectora_id" class="form-label">Empresa Recolectora</label>
            <select name="empresa_recolectora_id" class="form-control" required>
                <option value="">Seleccione empresa</option>
                @foreach($empresas as $empresa)
                    <option value="{{ $empresa->id }}" {{ $recolector->empresa_recolectora_id == $empresa->id ? 'selected' : '' }}>
                        {{ $empresa->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="numero_documento" class="form-label">Número Documento</label>
            <input type="text" name="numero_documento" class="form-control" value="{{ $recolector->numero_documento }}" required>
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="{{ $recolector->telefono }}" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('recolectores.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection