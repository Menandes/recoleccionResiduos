@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Empresas Recolectoras</h1>
    <a href="{{ route('empresaRecolectora.create') }}" class="btn btn-primary mb-3">Nueva Empresa</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($empresas as $empresa)
            <tr>
                <td>{{ $empresa->nombre }}</td>
                <td>{{ $empresa->direccion }}</td>
                <td>{{ $empresa->telefono }}</td>
                <td>
                    <a href="{{ route('empresaRecolectora.show', $empresa) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('empresaRecolectora.edit', $empresa) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('empresaRecolectora.destroy', $empresa) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar empresa?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection