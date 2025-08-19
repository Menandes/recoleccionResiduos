<nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
            <i class="fas fa-recycle me-2"></i>{{ config('app.name', 'Laravel') }}
        </a>

        <!-- Botón responsive -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav me-auto">
                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <i class="fas fa-home me-1"></i> Dashboard
                </a>
                <a class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}" href="{{ route('users.index') }}">
                    <i class="fas fa-users me-1"></i> Usuarios
                </a>
                <a class="nav-link {{ request()->routeIs('solicitudes.*') ? 'active' : '' }}" href="{{ route('solicitudes.index') }}">
                    <i class="fas fa-clipboard-list me-1"></i> Solicitud de residuos
                </a>
                <a class="nav-link {{ request()->routeIs('empresaRecolectora.*') ? 'active' : '' }}" href="{{ route('empresaRecolectora.index') }}">
                    <i class="fas fa-industry me-1"></i> Empresas Recolectoras
                </a>
                <a class="nav-link {{ request()->routeIs('recolectores.*') ? 'active' : '' }}" href="{{ route('recolectores.index') }}">
                    <i class="fas fa-truck me-1"></i> Recolectores
                </a>

                
              <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle {{ request()->routeIs('reportes.*') ? 'active' : '' }}" 
       href="#" id="navbarDropdownReportes" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-chart-bar me-1 text-white"></i> Reportes
    </a>

    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownReportes">
        <li>
            <a class="dropdown-item {{ request()->routeIs('reportes.usuario') ? 'active' : '' }}" 
               href="{{ route('reportes.usuario') }}">
                <i class="fas fa-user me-2 text-success"></i> Por Usuario
            </a>
        </li>
        <li>
            <a class="dropdown-item {{ request()->routeIs('reportes.general') ? 'active' : '' }}" 
               href="{{ route('reportes.general') }}">
                <i class="fas fa-globe me-2 text-success"></i> General
            </a>
        </li>
        <li>
            <a class="dropdown-item {{ request()->routeIs('reportes.empresa') ? 'active' : '' }}" 
               href="{{ route('reportes.empresa') }}">
                <i class="fas fa-building me-2 text-success"></i> Por Empresa
            </a>
        </li>
    </ul>
</li>

            </div>

            <!-- Dropdown usuario -->
            <div class="navbar-nav">
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fw-semibold" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fas fa-user-circle me-1"></i> {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="fas fa-user-edit me-2"></i> Perfil</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="fas fa-sign-out-alt me-2"></i> Cerrar sesión
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

{{-- FontAwesome --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    .navbar-dark .nav-link {
        color: rgba(255, 255, 255, 0.9) !important;
        transition: 0.2s;
    }
    .navbar-dark .nav-link.active {
        font-weight: bold;
        color: #fff !important;
    }
    .navbar-dark .nav-link:hover {
        color: #f1f1f1 !important;
    }
    .dropdown-menu {
        border-radius: 10px;
    }
</style>
