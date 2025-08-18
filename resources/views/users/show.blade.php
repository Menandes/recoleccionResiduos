@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center my-5">
    <div class="card shadow-lg border-0 rounded-4 w-100" style="max-width: 700px;">
        <!-- Header con degradado -->
        <div class="card-header text-white text-center py-4"
            style="background: linear-gradient(135deg, #2E7D32, #43A047); border-top-left-radius: 15px; border-top-right-radius: 15px;">
            <h3 class="mb-1"><i class="fas fa-user"></i> Detalles del Usuario</h3>
            <p class="mb-0">Información completa del usuario seleccionado</p>
        </div>

        <!-- Contenido -->
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4 fw-bold"><i class="fas fa-hashtag"></i> ID:</div>
                <div class="col-md-8">{{ $user->id }}</div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-4 fw-bold"><i class="fas fa-user"></i> Nombre:</div>
                <div class="col-md-8">{{ $user->name }}</div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-4 fw-bold"><i class="fas fa-envelope"></i> Email:</div>
                <div class="col-md-8">{{ $user->email }}</div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-4 fw-bold"><i class="fas fa-calendar-plus"></i> Creado el:</div>
                <div class="col-md-8">{{ $user->created_at->format('d/m/Y H:i') }}</div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-4 fw-bold"><i class="fas fa-calendar-check"></i> Actualizado el:</div>
                <div class="col-md-8">{{ $user->updated_at->format('d/m/Y H:i') }}</div>
            </div>

            <!-- Botones -->
            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('users.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
                <div>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" 
                            onclick="return confirm('¿Estás seguro de eliminar este usuario?')">
                            <i class="fas fa-trash"></i> Borrar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- FontAwesome --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

{{-- Estilos --}}
<style>
    body {
        background-color: #f4f6f9; /* gris claro */
    }
    .fw-bold {
        color: #2E7D32;
    }
    .btn {
        border-radius: 10px;
        font-size: 0.9rem;
        font-weight: bold;
        padding: 8px 16px;
    }
    .btn i {
        margin-right: 6px;
    }
    .btn-warning {
        background: #f39c12;
        border: none;
        color: white;
    }
    .btn-warning:hover {
        background: #e67e22;
    }
    .btn-danger {
        background: #e74c3c;
        border: none;
        color: white;
    }
    .btn-danger:hover {
        background: #c0392b;
    }
    .btn-secondary {
        background: #7f8c8d;
        border: none;
        color: white;
    }
    .btn-secondary:hover {
        background: #95a5a6;
    }
</style>
@endsection
