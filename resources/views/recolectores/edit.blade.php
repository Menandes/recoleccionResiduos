@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="card shadow-lg border-0 rounded-4">
            <!-- Header VERDE -->
            <div class="card-header text-white text-center py-4 card-header-green">
                <h3 class="mb-0"><i class="fas fa-user-edit"></i> Editar Recolector</h3>
            </div>

            <!-- Body -->
            <div class="card-body p-4">
                <form action="{{ route('recolectores.update', $recolector) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Usuario -->
                    <div class="mb-3">
                        <label for="user_id" class="form-label">
                            <i class="fas fa-user"></i> Usuario
                        </label>
                        <select name="user_id" id="user_id" class="form-control" required>
                            <option value="">Seleccione usuario</option>
                            @foreach($usuarios as $usuario)
                                <option value="{{ $usuario->id }}" {{ $recolector->user_id == $usuario->id ? 'selected' : '' }}>
                                    {{ $usuario->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Empresa -->
                    <div class="mb-3">
                        <label for="empresa_recolectora_id" class="form-label">
                            <i class="fas fa-industry"></i> Empresa Recolectora
                        </label>
                        <select name="empresa_recolectora_id" id="empresa_recolectora_id" class="form-control" required>
                            <option value="">Seleccione empresa</option>
                            @foreach($empresas as $empresa)
                                <option value="{{ $empresa->id }}" {{ $recolector->empresa_recolectora_id == $empresa->id ? 'selected' : '' }}>
                                    {{ $empresa->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Documento -->
                    <div class="mb-3">
                        <label for="numero_documento" class="form-label">
                            <i class="fas fa-id-card"></i> Número Documento
                        </label>
                        <input type="text" name="numero_documento" id="numero_documento" class="form-control"
                               value="{{ $recolector->numero_documento }}" required>
                    </div>

                    <!-- Teléfono -->
                    <div class="mb-3">
                        <label for="telefono" class="form-label">
                            <i class="fas fa-phone"></i> Teléfono
                        </label>
                        <input type="text" name="telefono" id="telefono" class="form-control"
                               value="{{ $recolector->telefono }}" required>
                    </div>

                    <!-- Botones -->
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('recolectores.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> Actualizar
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
        :root{
            --brand-green: #2E7D32;
            --brand-green-2: #43A047;
        }

        body { background-color: #f4f6f9; }

        .card { max-width: 700px; margin: 0 auto; }

        /* Header verde consistente con el resto */
        .card-header-green{
            background: linear-gradient(135deg, var(--brand-green), var(--brand-green-2));
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        /* Labels e íconos en verde */
        .form-label{
            font-weight: 600;
            color: var(--brand-green);
        }
        .form-label i{
            color: var(--brand-green);
            margin-right: .5rem;
        }

        .form-control{
            border-radius: 10px;
            padding: 12px;
            border: 2px solid #e0e0e0;
            transition: 0.3s;
        }
        .form-control:focus{
            border-color: var(--brand-green);
            box-shadow: none;
        }

        .btn{ border-radius: 10px; font-weight: bold; padding: 10px 18px; }

        /* Botón Actualizar en el mismo verde */
        .btn-success{
            background: var(--brand-green);
            border: none;
            color: #fff;
        }
        .btn-success:hover{ background: #1b5e20; }

        .btn-secondary{ background: #7f8c8d; border: none; }
        .btn-secondary:hover{ background: #95a5a6; }
    </style>
@endsection
