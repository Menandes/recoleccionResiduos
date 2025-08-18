<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            {{ config('app.name', 'Laravel') }}
        </a>

        <!-- Navigation Links -->
        <div class="navbar-nav me-auto">
            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                {{ __('Dashboard') }}
            </a>
            <a class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}" href="{{ route('users.index') }}">
                {{ __('Usuarios') }}
            </a>
            {{--  <a class="nav-link {{ request()->routeIs('residuos.*') ? 'active' : '' }}" href="{{ route('residuos.index') }}">
                {{ __('Residuos') }}
            </a>  --}}
            <a class="nav-link {{ request()->routeIs('solicitudes.*') ? 'active' : '' }}" href="{{ route('solicitudes.index') }}">
                {{ __('Solicitud de residuos') }}
            </a>
            <a class="nav-link {{ request()->routeIs('empresaRecolectora.*') ? 'active' : '' }}" href="{{ route('empresaRecolectora.index') }}">
                {{ __('Empresas Recolectoras') }}
            </a>
            <a class="nav-link {{ request()->routeIs('recolectores.*') ? 'active' : '' }}" href="{{ route('recolectores.index') }}">
                {{ __('Recolectores') }}
            </a>
        </div>

        <!-- Settings Dropdown -->
        <div class="navbar-nav">
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Perfil') }}</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">{{ __('Log Out') }}</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
