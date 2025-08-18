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
                <option value="Residuo Orgánico" {{ $residuo->categoria == 'Orgánico' ? 'selected' : '' }}>Residuo Orgánico</option>
                <option value="Residuo Inorgánico" {{ $residuo->categoria == 'Inorgánico' ? 'selected' : '' }}>Residuo Inorgánico</option>
                <option value="Residuo Peligroso" {{ $residuo->categoria == 'Peligroso' ? 'selected' : '' }}>Residuo Peligroso</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('residuos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
