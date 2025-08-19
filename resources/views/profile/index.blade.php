@extends('layouts.app')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

<style>
    body {
        font-family: 'Inter', sans-serif;
        background: #f3f4f6;
    }
    .profile-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.08);
        padding: 2rem;
        text-align: center;
        margin-bottom: 2rem;
    }
    .profile-avatar {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        border: 4px solid #10B981;
        object-fit: cover;
        margin-bottom: 1rem;
        background: #e5e7eb;
    }
    .profile-card h2 {
        margin: .5rem 0;
        font-size: 1.6rem;
        font-weight: 800;
        color: #111827;
    }
    .profile-card p {
        color: #6b7280;
        margin: .2rem 0;
    }
    .dashboard {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 1.5rem;
    }
    .dash-card {
        background: white;
        border-radius: 16px;
        padding: 2rem 1.5rem;
        text-align: center;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        transition: transform .2s ease, box-shadow .2s ease;
    }
    .dash-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(16,185,129,0.2);
    }
    .dash-icon {
        width: 60px;
        height: 60px;
        margin: 0 auto 1rem;
        background: #ECFDF5;
        color: #10B981;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        font-size: 1.8rem;
    }
    .dash-card h3 {
        margin-bottom: .5rem;
        font-size: 1.2rem;
        color: #111827;
    }
    .dash-card p {
        color: #6b7280;
        font-size: .9rem;
        margin-bottom: 1rem;
    }
    .btn-dashboard {
        display: inline-block;
        padding: .6rem 1.2rem;
        background: linear-gradient(135deg, #10B981, #34D399);
        color: white;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 600;
        font-size: .9rem;
    }
    .btn-dashboard:hover {
        box-shadow: 0 8px 20px rgba(16,185,129,0.3);
    }
</style>

<div class="container my-5">

    <!-- Perfil -->
    <div class="profile-card">
        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=10B981&color=fff"
             alt="Avatar" class="profile-avatar">
        <h2>{{ $user->name }}</h2>
        <p>{{ $user->email }}</p>
        <p>{{ $user->localidad ?? 'Localidad no registrada' }}</p>
        <p>Miembro desde: {{ $user->created_at->format('d/m/Y') }}</p>
    </div>

    <!-- Dashboard -->
    <div class="dashboard">
        <div class="dash-card">
            <div class="dash-icon"><i class="fas fa-plus-circle"></i></div>
            <h3>Nueva Solicitud</h3>
            <p>Programa una nueva recolección.</p>
            <a href="{{ route('solicitudes.create') }}" class="btn-dashboard">Hacer Solicitud</a>
        </div>  

        <div class="dash-card">
            <div class="dash-icon"><i class="fas fa-history"></i></div>
            <h3>Historial</h3>
            <p>Revisa todas tus solicitudes anteriores.</p>
            <a href="{{ route('solicitudes.index') }}" class="btn-dashboard">Ver Historial</a>
        </div>

        <div class="dash-card">
            <div class="dash-icon"><i class="fas fa-user-edit"></i></div>
            <h3>Editar Perfil</h3>
            <p>Actualiza tu información personal.</p>
            <a href="{{ route('profile.edit') }}" class="btn-dashboard">Editar</a>
        </div>

        <div class="dash-card">
            <div class="dash-icon"><i class="fas fa-sign-out-alt"></i></div>
            <h3>Cerrar Sesión</h3>
            <p>Salir de tu cuenta de manera segura.</p>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-dashboard">Salir</button>
            </form>
        </div>
    </div>

     <!-- Historial -->
    <div id="historial" class="card shadow-lg border-0 rounded-4 mb-5">
        <div class="card-header text-white text-center py-4"
            style="background: linear-gradient(135deg, #2E7D32, #43A047); border-top-left-radius: 15px; border-top-right-radius: 15px;">
            <h3 class="mb-1"><i class="fas fa-list"></i> Historial de Solicitudes</h3>
            <p class="mb-0">Consulta y gestiona tus solicitudes</p>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($solicitudes->isEmpty())
                <p class="text-center text-muted">No tienes solicitudes registradas.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle text-center">
                        <thead class="table-success">
                            <tr>
                                <th>Residuo</th>
                                <th>Fecha</th>
                                <th>Tipo</th>
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
                                    <td>
                                        <span class="badge 
                                            @if($solicitud->estado == 'En proceso') bg-warning 
                                            @elseif($solicitud->estado == 'Completado') bg-success 
                                            @else bg-secondary @endif">
                                            {{ $solicitud->estado ?? 'Pendiente' }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('solicitudes.edit', $solicitud) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('solicitudes.destroy', $solicitud) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('¿Eliminar esta solicitud?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
    
</div>
@endsection
