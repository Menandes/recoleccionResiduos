<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitud;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;

class ReporteController extends Controller
{
   public function reporteUsuarioPDF(Request $request)
{
    $userId = $request->input('user_id'); // ID del usuario seleccionado
    $user = User::with('solicitudes')->findOrFail($userId);

    // Calcular totales por tipo de residuo
    $totalesPorTipo = [];
    foreach ($user->solicitudes as $solicitud) {
        $tipo = $solicitud->tipo_residuo;
        if (!isset($totalesPorTipo[$tipo])) {
            $totalesPorTipo[$tipo] = 0;
        }
        $totalesPorTipo[$tipo] += $solicitud->peso ?? 0;
    }

    // Generar PDF
    $pdf = Pdf::loadView('reportes.usuarios_pdf', compact('user', 'totalesPorTipo'));

    // Descargar PDF
    return $pdf->download('reporte-usuario-' . $user->id . '.pdf');
}


    public function reportePorUsuario(Request $request)
    {
        $user = auth()->user();

        $desde = $request->input('desde');
        $hasta = $request->input('hasta');

        $query = Solicitud::where('user_id', $user->id);

        if ($desde && $hasta) {
            $query->whereBetween('created_at', [$desde, $hasta]);
        }

        $recolecciones = $query->with('residuo')->get();

        $totalPuntos = $recolecciones->sum('puntos');

        // --- NUEVO: resumen por tipo de residuo ---
        $resumenPorTipo = $recolecciones->groupBy('tipo_residuo')->map(function ($items) {
            return [
                'cantidad' => $items->count(),
                'total_kilos' => $items->sum('peso')
            ];
        });

        return view('reportes.usuario', compact('recolecciones', 'desde', 'hasta', 'totalPuntos', 'resumenPorTipo'));
    }

    public function reporteGeneral(Request $request)
    {
        $desde = $request->input('desde');
        $hasta = $request->input('hasta');
        $localidad = $request->input('localidad'); // asumiendo que usuario tiene localidad

        $query = Solicitud::query()->with(['user', 'residuo']);

        if ($desde && $hasta) {
            $query->whereBetween('fecha_recoleccion', [$desde, $hasta]);
        }

        if ($localidad) {
            $query->whereHas('user', function ($q) use ($localidad) {
                $q->where('localidad', $localidad);
            });
        }

        $solicitudes = $query->get();

        $totalesPorTipo = $solicitudes->groupBy('tipo_residuo')->map(function ($items) {
            return $items->sum('peso');
        });

        return view('reportes.general', compact('solicitudes', 'totalesPorTipo', 'desde', 'hasta', 'localidad'));
    }

    public function reportePorEmpresa(Request $request)
    {
        $empresaId = $request->input('empresa_id');
        $desde = $request->input('desde');
        $hasta = $request->input('hasta');
        $tipoResiduo = $request->input('tipo_residuo');

        $query = Solicitud::with(['empresaRecolectora', 'residuo']);

        if ($empresaId) {
            $query->where('empresa_recolectora_id', $empresaId);
        }

        if ($desde && $hasta) {
            $query->whereBetween('fecha_recoleccion', [$desde, $hasta]);
        }

        if ($tipoResiduo) {
            $query->where('tipo_residuo', $tipoResiduo);
        }

        $solicitudes = $query->get();

        $totalesPorTipo = $solicitudes->groupBy('tipo_residuo')->map->sum('peso');

        $empresas = \App\Models\EmpresaRecolectora::all();

        return view('reportes.empresa', compact('solicitudes', 'totalesPorTipo', 'empresas', 'empresaId', 'desde', 'hasta', 'tipoResiduo'));
    }
}
