@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center my-5">
        <div class="card shadow-lg border-0 rounded-4 w-100" style="max-width: 700px;">

            <!-- Header VERDE -->
            <div class="card-header text-white text-center py-4 card-header-green">
                <h3 class="mb-1"><i class="fas fa-user"></i> Detalle del Recolector</h3>
                <p class="mb-0">Información completa del recolector seleccionado</p>
            </div>

            <!-- Body -->
            <div class="card-body p-4">
                <div class="mb-3">
                    <i class="fas fa-user detail-ico"></i>
                    <span class="detail-label">Usuario:</span>
                    {{ $recolector->nombre ?? '-' }}
                </div>
                <div class="mb-3">
                    <i class="fas fa-building detail-ico"></i>
                    <span class="detail-label">Empresa Recolectora:</span>
                    {{ $recolector->empresaRecolectora?->nombre ?? '-' }}
                </div>
                <div class="mb-3">
                    <i class="fas fa-id-badge detail-ico"></i>
                    <span class="detail-label">Número Documento:</span>
                    {{ $recolector->numero_documento ?? '-' }}
                </div>
                <div class="mb-3">
                    <i class="fas fa-phone detail-ico"></i>
                    <span class="detail-label">Teléfono:</span>
                    {{ $recolector->telefono ?? '-' }}
                </div>
            </div>

            <!-- Footer -->
            <div class="card-footer d-flex justify-content-between align-items-center" style="background:#f6f7f8;">
                <a href="{{ route('recolectores.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
                <a href="{{ route('recolectores.edit', $recolector) }}" class="btn btn-success">
                    <i class="fas fa-pen-to-square"></i> Editar
                </a>
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
        .card { border-radius: 15px; }

        /* Header verde consistente */
        .card-header-green{
            background: linear-gradient(135deg, var(--brand-green), var(--brand-green-2));
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        /* Íconos y títulos en verde */
        .detail-ico{
            color: var(--brand-green);
            margin-right: .5rem;
            font-size: 1.05rem;
            vertical-align: -2px;
        }
        .detail-label{
            color: var(--brand-green);
            font-weight: 700;
            margin-right: .25rem;
        }

        /* Botones */
        .btn-success{
            background: var(--brand-green);
            border: none;
            color:#fff;
            font-weight: bold;
            border-radius: 10px;
            padding: 10px 18px;
        }
        .btn-success:hover{ background:#1b5e20; }

        .btn-secondary{
            background:#7f8c8d; border:none; font-weight:bold; border-radius:10px;
        }
        .btn-secondary:hover{ background:#95a5a6; }
    </style>
@endsection
