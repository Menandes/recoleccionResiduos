@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <!-- Card -->
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header text-white text-center py-3"
                        style="background: linear-gradient(135deg, #1565C0, #1E88E5);">
                        <h4 class="mb-0">Editar Perfil</h4>
                    </div>

                    <div class="card-body p-4">

                        <!-- Mensaje de éxito -->
                        @if (session('status') === 'profile-updated')
                            <div class="alert alert-success">
                                Perfil actualizado correctamente.
                            </div>
                        @endif

                        <!-- Formulario -->
                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            @method('PATCH')

                            <!-- Nombre -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $user->name) }}" required autofocus>
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo electrónico</label>
                                <input type="email" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email', $user->email) }}" required>
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="localidad_id" class="form-label">Localidad</label>
                                <select name="localidad_id" id="localidad_id" class="form-select">
                                    @foreach($localidades as $localidad)
                                        <option value="{{ $localidad->id }}" {{ $user->localidad_id == $localidad->id ? 'selected' : '' }}>
                                            {{ $localidad->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Contraseña nueva -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Nueva Contraseña</label>
                                <input type="password" name="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror">
                                <small class="form-text text-muted">Déjalo vacío si no deseas cambiarla.</small>
                                @error('password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Confirmar Contraseña -->
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control">
                            </div>

                            <!-- Botones -->
                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('profile.index') }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left"></i> Volver
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    Guardar cambios
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Card eliminar cuenta -->
                <div class="card mt-4 border-0 shadow-sm rounded-4">
                    <div class="card-header bg-danger text-white">
                        <h5 class="mb-0">Eliminar cuenta</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted">Una vez elimines tu cuenta, no podrás recuperarla.</p>

                        <form method="POST" action="{{ route('profile.destroy') }}">
                            @csrf
                            @method('DELETE')

                            <div class="mb-3">
                                <label for="password_delete" class="form-label">Confirma tu contraseña</label>
                                <input type="password" name="password" id="password_delete"
                                    class="form-control @error('password') is-invalid @enderror" required>
                                @error('password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('¿Estás seguro de que deseas eliminar tu cuenta?')">
                                Eliminar cuenta
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection