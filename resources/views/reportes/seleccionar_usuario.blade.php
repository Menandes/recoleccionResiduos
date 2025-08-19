@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Generar reporte PDF por usuario</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('reportes.usuario.pdf') }}" method="GET">
                        <div class="mb-3">
                            <label for="user_id" class="form-label fw-semibold">Selecciona un usuario:</label>
                            <select name="user_id" id="user_id" class="form-select" required>
                                @foreach(\App\Models\User::where('rol_id', function($query) {
                                    $query->select('id')->from('roles')->where('nombre', 'usuario')->limit(1);
                                })->get() as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Generar PDF</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 12px;
    }

    .card-header {
        font-size: 1.2rem;
        letter-spacing: 0.5px;
    }

    .btn-success {
        transition: 0.3s;
    }

    .btn-success:hover {
        background-color: #28a745cc;
    }
</style>
@endsection
