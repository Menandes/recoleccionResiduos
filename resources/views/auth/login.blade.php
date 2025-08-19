{{-- resources/views/auth/login.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EcoRecolecta - Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }
        
        .login-container {
            display: flex;
            min-height: 100vh;
        }
        
        /* Lado izquierdo - Formulario */
        .login-form-section {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            background-color: white;
        }
        
        .login-form-container {
            width: 100%;
            max-width: 400px;
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
            margin-bottom: 8px;
        }
        
        .logo-subtitle {
            color: #6b7280;
            font-size: 1rem;
            font-weight: 400;
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
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-label {
            display: block;
            margin-bottom: 8px;
            color: #374151;
            font-weight: 500;
            font-size: 0.9rem;
        }
        
        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 1.5px solid #d1d5db;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.2s ease;
            background-color: #ffffff;
        }
        
        .form-control:focus {
            outline: none;
            border-color: #10B981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }
        
        .form-control::placeholder {
            color: #9ca3af;
        }
        
        .form-check {
            margin: 24px 0;
        }
        
        .form-check-input {
            margin-right: 8px;
        }
        
        .form-check-label {
            color: #6b7280;
            font-size: 0.9rem;
        }
        
        .btn-login {
            width: 100%;
            background: linear-gradient(135deg, #10B981, #059669);
            border: none;
            padding: 14px 24px;
            border-radius: 8px;
            color: white;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            margin-bottom: 20px;
        }
        
        .btn-login:hover {
            background: linear-gradient(135deg, #059669, #047857);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.4);
        }
        
        .forgot-password {
            text-align: center;
            margin: 20px 0;
        }
        
        .forgot-password a {
            color: #10B981;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
        }
        
        .forgot-password a:hover {
            text-decoration: underline;
        }
        
        .register-link {
            text-align: center;
            margin-top: 32px;
            padding-top: 24px;
            border-top: 1px solid #e5e7eb;
            color: #6b7280;
            font-size: 0.9rem;
        }
        
        .register-link a {
            color: #10B981;
            font-weight: 600;
            text-decoration: none;
        }
        
        .register-link a:hover {
            text-decoration: underline;
        }
        
        /* Lado derecho - Imagen/Banner */
        .banner-section {
            flex: 1;
            background: linear-gradient(135deg, #10B981 0%, #059669 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            color: white;
            text-align: center;
            padding: 40px;
            position: relative;
            overflow: hidden;
        }
        
        .banner-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
            opacity: 0.3;
        }
        
        .banner-content {
            position: relative;
            z-index: 1;
        }
        
        .banner-icon {
            font-size: 4rem;
            margin-bottom: 24px;
            opacity: 0.9;
        }
        
        .banner-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 16px;
            line-height: 1.2;
        }
        
        .banner-subtitle {
            font-size: 1.2rem;
            opacity: 0.9;
            margin-bottom: 32px;
            line-height: 1.4;
        }
        
        .banner-features {
            list-style: none;
            text-align: left;
            max-width: 300px;
        }
        
        .banner-features li {
            padding: 8px 0;
            display: flex;
            align-items: center;
            opacity: 0.9;
        }
        
        .banner-features li i {
            margin-right: 12px;
            font-size: 1.2rem;
        }
        
        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: none;
        }
        
        .alert-danger {
            background-color: #fef2f2;
            color: #dc2626;
            border-left: 4px solid #dc2626;
        }
        
        .alert-success {
            background-color: #f0fdf4;
            color: #16a34a;
            border-left: 4px solid #16a34a;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
            }
            
            .banner-section {
                min-height: 200px;
                padding: 30px 20px;
            }
            
            .banner-title {
                font-size: 2rem;
            }
            
            .banner-subtitle {
                font-size: 1rem;
            }
            
            .banner-features {
                display: none;
            }
            
            .login-form-section {
                padding: 30px 20px;
            }
            
            .logo-section {
                margin-bottom: 30px;
            }
            
            .logo-icon {
                width: 60px;
                height: 60px;
            }
            
            .logo-icon i {
                font-size: 30px;
            }
            
            .logo-title {
                font-size: 1.75rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Sección del formulario -->
        <div class="login-form-section">
            <div class="login-form-container">
                <div class="logo-section">
                    <div class="logo-icon">
                        <i class="fas fa-recycle"></i>
                    </div>
                    <h1 class="logo-title">EcoRecolecta</h1>
                    <p class="logo-subtitle">Gestión Inteligente de Residuos</p>
                </div>
                
                <div class="form-section">
                    <h2 class="form-title">Iniciar Sesión</h2>
                    <p class="form-subtitle">Ingresa tus credenciales para acceder a tu cuenta</p>

                    <!-- Mensajes de error -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <!-- Mensaje de éxito -->
                    @if (session('status'))
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <div class="form-group">
                            <label class="form-label" for="email">Correo Electrónico</label>
                            <input type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   id="email" 
                                   name="email" 
                                   placeholder="ejemplo@correo.com"
                                   value="{{ old('email') }}"
                                   required 
                                   autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label" for="password">Contraseña</label>
                            <input type="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   id="password" 
                                   name="password" 
                                   placeholder="Ingresa tu contraseña"
                                   required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-check">
                            <input class="form-check-input" 
                                   type="checkbox" 
                                   name="remember" 
                                   id="remember">
                            <label class="form-check-label" for="remember">
                                Recordarme
                            </label>
                        </div>
                        
                        <button type="submit" class="btn-login">
                            Iniciar Sesión
                        </button>
                    </form>
                    
                    <div class="forgot-password">
                        <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                    </div>
                    
                    <div class="register-link">
                        ¿No tienes una cuenta? 
                        <a href="{{ route('register') }}">Regístrate aquí</a>
                    </div>

                    <!-- 🔙 Botón para regresar -->
                    <div class="text-center mt-4">
                        <a href="{{ url('/') }}" class="btn btn-outline-secondary w-100">
                            <i class="fas fa-arrow-left me-2"></i> Regresar
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Sección del banner -->
        <div class="banner-section">
            <div class="banner-content">
                <div class="banner-icon">
                    <i class="fas fa-leaf"></i>
                </div>
                <h2 class="banner-title">Bienvenido a EcoRecolecta</h2>
                <p class="banner-subtitle">La plataforma que revoluciona la gestión de residuos domésticos</p>
                
                <ul class="banner-features">
                    <li><i class="fas fa-check-circle"></i> Programar recolecciones</li>
                    <li><i class="fas fa-check-circle"></i> Sistema de puntos</li>
                    <li><i class="fas fa-check-circle"></i> Reportes detallados</li>
                    <li><i class="fas fa-check-circle"></i> Notificaciones WhatsApp</li>
                </ul>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>