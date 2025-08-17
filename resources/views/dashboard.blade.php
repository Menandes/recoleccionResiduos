@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mb-4">Bienvenido, {{ Auth::user()->name }}!</h3>
                    
                    <div class="row mb-4">
                        <div class="col-md-4 mb-3">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Usuarios totales</h5>
                                    <h2 class="card-text">{{ \App\Models\User::count() }}</h2>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Acciones rápidas</h5>
                                    <div class="mt-2">
                                        <a href="{{ route('users.create') }}" class="text-white text-decoration-none d-block">Añadir nuevo usuario</a>
                                        <a href="{{ route('users.index') }}" class="text-white text-decoration-none d-block">Ver todos los usuarios</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Tu cuenta</h5>
                                    <p class="card-text small">{{ Auth::user()->email }}</p>
                                    <a href="{{ route('profile.edit') }}" class="text-white text-decoration-none">Editar perfil</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="border-top pt-4">
                        <h4 class="mb-3">Usuarios recientes</h4>
                        <div class="table-responsive">
                            <table class="table table-striped">
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
                                        <td>{{ $user->created_at->format('M d, Y') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
