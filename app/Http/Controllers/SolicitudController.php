<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use App\Models\Residuo;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $solicitudes = Solicitud::with('residuo')->get();
        return view('solicitudes.index', compact('solicitudes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $residuos = Residuo::all();
        return view('solicitudes.create', compact('residuos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'residuo_id' => 'required|exists:residuos,id',
            'fecha_recoleccion' => 'required|date',
            'tipo_residuo' => 'required|string|max:100',
            'peso' => 'nullable|numeric',
            'descripcion' => 'nullable|string',
            'estado' => 'nullable|string',
        ]);

        $descripcion = trim($request->descripcion);
        if (empty($descripcion)) {
            $descripcion = 'Sin descripción proporcionada';
        }

         Solicitud::create([
            'user_id' => auth()->id(),
            'residuo_id' => $request->residuo_id,
            'fecha_recoleccion' => $request->fecha_recoleccion,
            'tipo_residuo' => $request->tipo_residuo,
            'peso' => $request->peso,
            'descripcion' => $request->descripcion,
            'estado' => $request->estado,
        ]);

        return redirect()->route('solicitudes.index')->with('success', 'Solicitud creada correctamente.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Solicitud $solicitud)
    {
        return view('solicitudes.show', compact('solicitud'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Solicitud $solicitud)
    {
         $residuos = Residuo::all();
         return view('solicitudes.edit', compact('solicitud', 'residuos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Solicitud $solicitud)
    {
        $request->validate([
            'residuo_id' => 'required|exists:residuos,id',
            'fecha_recoleccion' => 'required|date',
            'tipo_residuo' => 'required|string|max:100',
            'peso' => 'nullable|numeric',
            'descripcion' => 'nullable|string',
            'estado' => 'nullable|string',
        ]);

        $descripcion = trim($request->descripcion);
        if (empty($descripcion)) {
            $descripcion = 'Sin descripción proporcionada';
        }

        $solicitud->update([
            'residuo_id' => $request->residuo_id,
            'fecha_recoleccion' => $request->fecha_recoleccion,
            'tipo_residuo' => $request->tipo_residuo,
            'peso' => $request->peso,
            'descripcion' => $request->descripcion,
            'estado' => $request->estado,
        ]);

        return redirect()->route('solicitudes.index')
            ->with('success', 'Solicitud actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Solicitud $solicitud)
    {
        $solicitud->delete();

        return redirect()->route('solicitudes.index')->with('success', 'Solicitud eliminada correctamente.');
    }

    public function residuo()
    {
        return $this->belongsTo(Residuo::class);
    }
}
