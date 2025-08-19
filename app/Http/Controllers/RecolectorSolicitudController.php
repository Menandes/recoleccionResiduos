<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;

class RecolectorSolicitudController extends Controller
{
    // Mostrar solo las solicitudes pendientes
    public function index()
    {
        $solicitudes = Solicitud::with('usuario.localidad', 'empresaRecolectora')
            ->where('estado', 'Pendiente')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('recolectorSolicitud.index', compact('solicitudes'));
    }

    // Completar solicitud → cambiar estado a "Recolectado"
    public function completar($id)
    {
        $solicitud = Solicitud::findOrFail($id);

        // Solo permitir completar si está pendiente
        if ($solicitud->estado === 'Pendiente') {
            $solicitud->estado = 'Recolectado';
            $solicitud->save();

            return redirect()->back()->with('success', 'Solicitud completada exitosamente');
        }

        return redirect()->back()->with('error', 'La solicitud no se puede completar.');
    }

    // Cancelar solicitud → cambiar estado a "En proceso"
    public function cancelar($id)
    {
        $solicitud = Solicitud::findOrFail($id);

        // Solo permitir cancelar si está pendiente
        if ($solicitud->estado === 'Pendiente') {
            $solicitud->estado = 'En proceso';
            $solicitud->save();

            return redirect()->back()->with('error', 'Solicitud cancelada, ahora está en proceso');
        }

        return redirect()->back()->with('error', 'La solicitud no se puede cancelar.');
    }
}
