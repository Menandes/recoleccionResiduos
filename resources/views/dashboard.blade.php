@extends('layouts.app')

@section('content')
<style>
/* ===== Estilos internos ===== */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f5f5f5;
}

.main-content {
    padding: 30px;
}

/* Cards */
.card-custom {
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    margin-bottom: 20px;
    padding: 20px;
    color: white;
}

.card-custom h5 {
    font-size: 16px;
}

.card-custom h2 {
    font-size: 28px;
    margin-top: 10px;
}

/* Tabla usuarios */
.users-table-container {
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    margin-top: 20px;
}

.table-header {
    background: #f8f9fa;
    padding: 20px;
    border-bottom: 1px solid #dee2e6;
}

.table-title {
    font-size: 18px;
    font-weight: 600;
    color: #333;
}

.users-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

.users-table th,
.users-table td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #e9ecef;
}

.users-table tr:hover {
    background-color: #f8f9fa;
}

.text-white {
    color: white !important;
    text-decoration: none;
}

.mt-2 a {
    display: block;
    margin-top: 5px;
}
</style>

<div class="main-content">
    <h1 class="mb-4">Bienvenido, {{ Auth::user()->name }}!</h1>

    <div class="row mb-4">
        <div class="col-md-4 mb-3">
            <div class="card-custom" style="background-color:#1976d2;">
                <h5>Usuarios totales</h5>
                <h2>{{ \App\Models\User::count() }}</h2>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card-custom" style="background-color:#4caf50;">
                <h5>Acciones rápidas</h5>
                <div class="mt-2">
                    <a href="{{ route('users.create') }}" class="text-white">Añadir nuevo usuario</a>
                    <a href="{{ route('users.index') }}" class="text-white">Ver todos los usuarios</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card-custom" style="background-color:#03a9f4;">
                <h5>Tu cuenta</h5>
                <p class="small">{{ Auth::user()->email }}</p>
                <a href="{{ route('profile.edit') }}" class="text-white">Editar perfil</a>
            </div>
        </div>
    </div>

    <!-- Usuarios recientes -->
    <div class="users-table-container">
        <div class="table-header">
            <h3 class="table-title">Usuarios recientes</h3>
        </div>
        <table class="users-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Fecha creación</th>
                </tr>
            </thead>
            <tbody>
                @foreach(\App\Models\User::latest()->take(5)->get() as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('d/m/Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
