@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Recolectores</h1>
    <a href="{{ route('recolectores.create') }}" class="btn btn-primary mb-3">Nuevo Recolector</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Empresa</th>
                <th>Número Documento</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recolectores as $recolector)
            <tr>
                <td>{{ $recolector->nombre ?? '-' }}</td>
                <td>{{ $recolector->empresaRecolectora->nombre ?? '-' }}</td>
                <td>{{ $recolector->numero_documento }}</td>
                <td>{{ $recolector->telefono }}</td>
                <td>
                    <a href="{{ route('recolectores.show', $recolector) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('recolectores.edit', $recolector) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('recolectores.destroy', $recolector) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar recolector?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection