@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Residuo</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Errores:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('residuos.update', $residuo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del residuo</label>
            <input type="text" name="nombre" class="form-control" value="{{ $residuo->nombre }}" required>
        </div>

        <div class="mb-3">
            <label for="categoria" class="form-label">Categoría</label>
            <select name="categoria" class="form-control" required>
                <option value="Orgánico" {{ $residuo->categoria == 'Orgánico' ? 'selected' : '' }}>Orgánico</option>
                <option value="Inorgánico" {{ $residuo->categoria == 'Inorgánico' ? 'selected' : '' }}>Inorgánico</option>
                <option value="Peligroso" {{ $residuo->categoria == 'Peligroso' ? 'selected' : '' }}>Peligroso</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control" rows="3">{{ $residuo->descripcion }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('residuos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
