@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="card shadow-lg border-0 rounded-4">
        <!-- Header con degradado -->
        <div class="card-header text-white text-center py-4"
            style="background: linear-gradient(135deg, #2E7D32, #43A047); border-top-left-radius: 15px; border-top-right-radius: 15px;">
            <h3><i class="fas fa-users me-2"></i> Gestión de Usuarios</h3>
            <p class="mb-0">Administra los usuarios registrados en la plataforma</p>
        </div>

        <div class="card-body">
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('users.create') }}" class="btn btn-success">
                    <i class="fas fa-user-plus"></i> Añadir Nuevo Usuario
                </a>

            </div>

            <div class="table-responsive">
                <table class="table align-middle table-hover">
                    <thead class="table-success">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Fecha de Registro</th>
                            <th>Puntos</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>#{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->format('d/m/Y') }}</td>
                            <td class="text-center">{{ $user->puntos ?? 0 }}</td>
                            <td>
                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> Ver
                                </a>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Estás seguro de eliminar este usuario?')">
                                        <i class="fas fa-trash"></i> Borrar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- FontAwesome --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

{{-- Ajustes globales --}}
<style>
    body {
        background-color: #f4f6f9; /* gris claro, ya no el verde fuerte */
    }
    .table th {
        text-align: center;
    }
    .table td {
        vertical-align: middle;
    }
</style>
@endsection
