@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear nuevo Residuo</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('residuos.store') }}" method="POST">
        @csrf

       <div class="mb-3">
            <label for="categoria" class="form-label">Categoría</label>
            <select name="categoria" id="categoria" class="form-control" required>
                <option value="" disabled selected>--Seleccione una categoría--</option>
                <option value="Residuo Orgánico" {{ old('categoria') == 'Residuo Orgánico' ? 'selected' : '' }}>Residuo Orgánico</option>
                <option value="Residuo Inorgánico" {{ old('categoria') == 'Residuo Inorgánico' ? 'selected' : '' }}>Residuo Inorgánico</option>
                <option value="Residuo Peligroso" {{ old('categoria') == 'Residuo Peligroso' ? 'selected' : '' }}>Residuo Peligroso</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" required
            placeholder="Ej: Botellas plásticas, Vidrio, Pilas usadas">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('residuos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
