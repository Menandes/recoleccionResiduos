<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EcoRecolecta - Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }

        .register-container {
            display: flex;
            min-height: 100vh;
        }

        .register-form-section {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            background-color: white;
        }

        .register-form-container {
            width: 100%;
            max-width: 420px;
        }

        .logo-section {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #10B981, #059669);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }

        .logo-icon i {
            font-size: 40px;
            color: white;
        }

        .logo-title {
            font-size: 2rem;
            font-weight: 700;
            color: #1f2937;
        }

        .form-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 8px;
            text-align: center;
        }

        .form-subtitle {
            color: #6b7280;
            text-align: center;
            margin-bottom: 32px;
            font-size: 0.9rem;
        }

        .form-label {
            margin-bottom: 6px;
            font-weight: 500;
            color: #374151;
        }

        .form-control {
            padding: 12px 14px;
            border-radius: 8px;
            border: 1.5px solid #d1d5db;
        }

        .form-control:focus {
            border-color: #10B981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }

        .btn-register {
            width: 100%;
            background: linear-gradient(135deg, #10B981, #059669);
            border: none;
            padding: 14px 24px;
            border-radius: 8px;
            color: white;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.2s ease;
            margin-top: 10px;
        }

        .btn-register:hover {
            background: linear-gradient(135deg, #059669, #047857);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.4);
        }

        .extra-links {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9rem;
            color: #6b7280;
        }

        .extra-links a {
            color: #10B981;
            text-decoration: none;
            font-weight: 600;
        }

        .extra-links a:hover {
            text-decoration: underline;
        }

        .banner-section {
            flex: 1;
            background: linear-gradient(135deg, #10B981 0%, #059669 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            padding: 40px;
        }

        .banner-title {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 16px;
        }

        .banner-subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        @media (max-width: 768px) {
            .register-container {
                flex-direction: column;
            }

            .banner-section {
                padding: 30px 20px;
            }
        }
    </style>
</head>

<body>
    <div class="register-container">
        <!-- Formulario -->
        <div class="register-form-section">
            <div class="register-form-container">
                <div class="logo-section">
                    <div class="logo-icon"><i class="fas fa-recycle"></i></div>
                    <h1 class="logo-title">EcoRecolecta</h1>
                </div>

                <h2 class="form-title">Crear Cuenta</h2>
                <p class="form-subtitle">Completa el formulario para registrarte</p>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Nombre -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autofocus>
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <!-- Correo -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required>
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <!-- Localidad -->
                    <div class="mb-3">
                        <label class="form-label">Localidad</label>
                        <select name="localidad_id" class="form-select @error('localidad_id') is-invalid @enderror"
                            required>
                            <option value="">Seleccione una localidad</option>
                            @forelse($localidades as $localidad)
                                <option value="{{ $localidad->id }}" {{ old('localidad_id') == $localidad->id ? 'selected' : '' }}>
                                    {{ $localidad->nombre }}
                                </option>
                            @empty
                                <option value="" disabled>No hay localidades disponibles</option>
                            @endforelse
                        </select>
                        @error('localidad_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <!-- Contraseña -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required>
                        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <!-- Confirmar contraseña -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                        <input id="password_confirmation" type="password" class="form-control"
                            name="password_confirmation" required>
                    </div>

                    <!-- Botón -->
                    <button type="submit" class="btn-register">Registrarse</button>
                </form>

                <div class="extra-links mt-3">
                    ¿Ya tienes una cuenta? <a href="{{ route('login') }}">Inicia sesión aquí</a>
                </div>
                <div class="extra-links">
                    <a href="{{ url('/') }}"><i class="fas fa-arrow-left me-1"></i> Regresar</a>
                </div>
            </div>
        </div>

        <!-- Banner -->
        <div class="banner-section">
            <div>
                <h2 class="banner-title">Únete a EcoRecolecta</h2>
                <p class="banner-subtitle">Haz parte de la revolución en la gestión de residuos y gana recompensas por
                    ayudar al planeta.</p>
            </div>
        </div>
    </div>
</body>

</html>