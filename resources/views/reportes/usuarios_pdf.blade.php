<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de {{ $user->name }}</title>
    <style>
        /* Mantén tus estilos tal cual, solo cambia donde aparezca $usuarios a $user */
        body { font-family: 'Helvetica', sans-serif; font-size: 11px; line-height: 1.4; color: #333; }
        .container { max-width: 100%; margin: 0 auto; padding: 20px; }
        .header { text-align: center; margin-bottom: 30px; padding-bottom: 20px; border-bottom: 3px solid #2E7D32; }
        .header h1 { color: #2E7D32; font-size: 24px; font-weight: bold; margin-bottom: 5px; }
        .header .subtitle { color: #666; font-size: 14px; margin-bottom: 10px; }
        .header .date-info { background-color: #f5f5f5; padding: 8px 15px; border-radius: 5px; display: inline-block; font-size: 12px; color: #555; }
        .summary-cards { display: flex; justify-content: space-between; margin-bottom: 25px; gap: 15px; }
        .summary-card { flex: 1; background-color: #f8f9fa; border: 1px solid #e9ecef; border-radius: 8px; padding: 15px; text-align: center; border-left: 4px solid #2E7D32; }
        .summary-card .number { font-size: 20px; font-weight: bold; color: #2E7D32; margin-bottom: 5px; }
        .summary-card .label { font-size: 11px; color: #666; text-transform: uppercase; letter-spacing: 0.5px; }
        .section-header { background: linear-gradient(135deg, #2E7D32, #4CAF50); color: white; padding: 12px 20px; margin: 25px 0 15px 0; border-radius: 6px; font-size: 14px; font-weight: bold; text-transform: uppercase; letter-spacing: 0.5px; box-shadow: 0 2px 4px rgba(46, 125, 50, 0.3); }
        table { width: 100%; border-collapse: collapse; background-color: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); }
        th { background: linear-gradient(135deg, #2E7D32, #388E3C); color: white; padding: 12px 10px; text-align: center; font-size: 11px; font-weight: bold; text-transform: uppercase; }
        td { padding: 10px; text-align: center; border-bottom: 1px solid #f1f3f4; font-size: 11px; }
        tr:nth-child(even) { background-color: #fafbfc; }
        tr:hover { background-color: #f0f7f0; }
        .status-badge { padding: 4px 8px; border-radius: 12px; font-size: 9px; font-weight: bold; text-transform: uppercase; letter-spacing: 0.3px; }
        .status-completado { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .status-pendiente { background-color: #fff3cd; color: #856404; border: 1px solid #ffeaa7; }
        .status-cancelado { background-color: #f8d7da; color: #721c24; border: 1px solid #f1b0b7; }
        .status-en_proceso { background-color: #cce5ff; color: #004085; border: 1px solid #a6d5fa; }
        .waste-type { padding: 4px 8px; border-radius: 8px; font-size: 10px; font-weight: 500; background-color: #e8f5e8; color: #2E7D32; border: 1px solid #c8e6c9; }
        .points { font-weight: bold; color: #ff6b35; background-color: #fff5f0; padding: 4px 8px; border-radius: 8px; border: 1px solid #ffccbc; }
        .weight { font-weight: bold; color: #2E7D32; }
        .footer { margin-top: 40px; padding-top: 20px; border-top: 2px solid #e9ecef; text-align: center; color: #666; font-size: 10px; }
        .footer .company-info { margin-bottom: 10px; font-weight: bold; color: #2E7D32; }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>Reporte de Recolecciones</h1>
            <div class="subtitle">{{ $user->name }} ({{ $user->email }})</div>
            <div class="date-info">Generado el: {{ date('d/m/Y H:i:s') }}</div>
        </div>

        <!-- Summary Cards -->
        <div class="summary-cards">
            <div class="summary-card">
                <div class="number">{{ $user->solicitudes->count() }}</div>
                <div class="label">Total Solicitudes</div>
            </div>
            <div class="summary-card">
                <div class="number">{{ number_format($user->solicitudes->sum('peso'), 1) }} Kg</div>
                <div class="label">Kg Recolectados</div>
            </div>
            <div class="summary-card">
                <div class="number">{{ number_format($user->solicitudes->sum('puntos')) }} pts</div>
                <div class="label">Puntos Totales</div>
            </div>
        </div>

        <!-- Detalle de Solicitudes -->
        <div class="section-header">📋 Detalle de Solicitudes</div>
        <table>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Tipo de Residuo</th>
                    <th>Peso (Kg)</th>
                    <th>Estado</th>
                    <th>Puntos</th>
                    <th>Observaciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user->solicitudes as $solicitud)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($solicitud->created_at)->format('d/m/Y') }}</td>
                    <td><span class="waste-type">{{ $solicitud->tipo_residuo }}</span></td>
                    <td class="weight">{{ number_format($solicitud->peso ?? 0, 1) }}</td>
                    <td>
                        <span class="status-badge status-{{ strtolower(str_replace(' ', '_', $solicitud->estado)) }}">
                            {{ ucfirst($solicitud->estado) }}
                        </span>
                    </td>
                    <td><span class="points">{{ $solicitud->puntos ?? 0 }}</span></td>
                    <td style="font-size: 10px;">{{ $solicitud->observaciones ?? 'Sin observaciones' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Resumen por Tipo de Residuo -->
        <div class="section-header" style="margin-top: 30px;">📊 Resumen por Tipo de Residuo</div>
        <table>
            <thead>
                <tr>
                    <th>Tipo de Residuo</th>
                    <th>Total Kg</th>
                </tr>
            </thead>
            <tbody>
                @foreach($totalesPorTipo as $tipo => $total)
                <tr>
                    <td>{{ $tipo }}</td>
                    <td class="weight">{{ number_format($total, 1) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Footer -->
        <div class="footer">
            <div class="company-info">Sistema de Gestión de Residuos Ecológicos</div>
            <div>Comprometidos con el medio ambiente y la sostenibilidad</div>
            <div style="margin-top: 10px; color: #999;">Documento generado automáticamente - {{ date('d/m/Y H:i:s') }}</div>
        </div>
    </div>
</body>
</html>
