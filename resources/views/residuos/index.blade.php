@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Lista de Residuos</h1>

    <a href="{{ route('residuos.create') }}" class="btn btn-primary mb-3">Crear nuevo residuo</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($residuos->isEmpty())
        <p>No hay residuos registrados.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($residuos as $residuo)
                    <tr>
                        <td>{{ $residuo->nombre }}</td>
                        <td>{{ $residuo->categoria }}</td>
                        <td>
                            <a href="{{ route('residuos.edit', $residuo) }}" class="btn btn-sm btn-warning">Editar</a>

                            <form action="{{ route('residuos.destroy', $residuo) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Estás seguro de eliminar este residuo?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
