<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .welcome-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: none;
            border-radius: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card welcome-card shadow-lg">
                    <div class="card-body text-center p-5">
                        <h1 class="display-4 mb-4">CRUD Usuarios residuos</h1>
                        <p class="lead mb-4">Una aplicación Laravel simple con autenticación de usuarios y operaciones CRUD.</p>
                        
                        <div class="row mb-4">
                            <div class="col-md-6 mb-3">
                                <div class="card bg-primary text-white">
                                    <div class="card-body">
                                        <h5>Features</h5>
                                        <ul class="list-unstyled mb-0">
                                            <li>Autenticación de usuario</li>
                                            <li>Operaciones CRUD de usuarios</li>
                                            <li>Dashboard de estadísticas</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="card bg-success text-white">
                                    <div class="card-body">
                                        <h5>Usuarios de test</h5>
                                        <small>
                                            john@example.com<br>
                                            jane@example.com<br>
                                            bob@example.com<br>
                                            Contraseña: password
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Login</a>
                            <a href="{{ route('register') }}" class="btn btn-outline-primary">Registrar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
