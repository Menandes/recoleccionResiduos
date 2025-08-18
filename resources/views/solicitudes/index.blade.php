@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Listado de Solicitudes</h1>

    <a href="{{ route('solicitudes.create') }}" class="btn btn-primary mb-3">Crear nueva solicitud</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($solicitudes->isEmpty())
        <p>No hay solicitudes registradas.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Residuo</th>
                    <th>Fecha de Recolección</th>
                    <th>Tipo de Residuo</th>
                    <th>Peso (kg)</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($solicitudes as $solicitud)
                    <tr>
                        <td>{{ $solicitud->residuo->nombre ?? 'Sin residuo' }}</td>
                        <td>{{ $solicitud->fecha_recoleccion }}</td>
                        <td>{{ $solicitud->tipo_residuo }}</td>
                        <td>{{ $solicitud->peso ?? '-' }}</td>
                        <td>{{ $solicitud->descripcion ?? '-' }}</td>
                        <td>{{ $solicitud->estado ?? 'Pendiente' }}</td>
                        <td>
                            <a href="{{ route('solicitudes.edit', $solicitud) }}" class="btn btn-sm btn-warning">Editar</a>

                            <form action="{{ route('solicitudes.destroy', $solicitud) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Estás seguro de eliminar esta solicitud?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
