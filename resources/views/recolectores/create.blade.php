@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center my-5">
    <div class="card shadow-lg border-0 rounded-4 w-100" style="max-width: 700px;">

        <!-- Header -->
        <div class="card-header text-white text-center py-4"
             style="background: linear-gradient(135deg, #2E7D32, #43A047); border-top-left-radius: 15px; border-top-right-radius: 15px;">
            <h3 class="mb-1"><i class="fas fa-user-plus"></i> Nuevo Recolector</h3>
            <p class="mb-0">Registra un nuevo recolector</p>
        </div>

        <!-- Body -->
        <div class="card-body p-4">
            <form action="{{ route('recolectores.store') }}" method="POST">
                @csrf

                <!-- Nombre -->
                <div class="mb-3">
                    <label for="nombre" class="form-label"><i class="fas fa-user"></i> Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required>
                </div>

                <!-- Empresa -->
                <div class="mb-3">
                    <label for="empresa_recolectora_id" class="form-label"><i class="fas fa-industry"></i> Empresa Recolectora</label>
                    <select name="empresa_recolectora_id" id="empresa_recolectora_id" class="form-control" required>
                        <option value="">Seleccione empresa</option>
                        @foreach($empresas as $empresa)
                            <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Documento -->
                <div class="mb-3">
                    <label for="numero_documento" class="form-label"><i class="fas fa-id-card"></i> Número Documento</label>
                    <input type="text" name="numero_documento" id="numero_documento" class="form-control" required>
                </div>

                <!-- Teléfono -->
                <div class="mb-3">
                    <label for="telefono" class="form-label"><i class="fas fa-phone"></i> Teléfono</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" required>
                </div>

                <!-- Botones -->
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('recolectores.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- FontAwesome --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

{{-- Estilos --}}
<style>
    :root { --brand-green: #2E7D32; } /* mismo verde del header */

    body { background-color: #f4f6f9; }

    .card { max-width: 700px; margin: 0 auto; }

    /* <<< NUEVO: color de labels e íconos >>> */
    .form-label{
        color: var(--brand-green);
        font-weight: 600;
    }
    .form-label i{
        color: var(--brand-green);   /* asegura que el icono herede el verde */
        margin-right: .5rem;
    }

    .form-control{
        border-radius: 10px;
        padding: 12px;
        border: 2px solid #e0e0e0;
        transition: border-color .3s ease;
    }
    .form-control:focus{
        border-color: var(--brand-green);
        box-shadow: none;
    }

    .btn{ border-radius: 10px; font-weight: bold; padding: 10px 18px; }
    .btn-success{ background: var(--brand-green); border: none; }
    .btn-success:hover{ background: #1b5e20; }
    .btn-secondary{ background: #7f8c8d; border: none; }
    .btn-secondary:hover{ background: #95a5a6; }
</style>
@endsection
