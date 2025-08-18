<?php

namespace App\Http\Controllers;

use App\Models\Residuo;
use Illuminate\Http\Request;


class ResiduoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $residuos = Residuo::all(); // Trae todos los residuos de la base de datos

        return view('residuos.index', compact('residuos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('residuos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'categoria' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
        ]);

         Residuo::create([
            'nombre' => $request->nombre,
            'categoria' => $request->categoria,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('residuos.index')->with('success', 'Residuo creado exitosamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Residuo $residuo)
    {
        return view('residuos.edit', compact('residuo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Residuo $residuo)
    { 
        $request->validate([
            'nombre' => 'required|string|max:255',
            'categoria' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
        ]);

        $residuo->update([
            'nombre' => $request->nombre,
            'categoria' => $request->categoria,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('residuos.index')->with('success', 'Residuo actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Residuo $residuo)
    {
         $residuo->delete();

         return redirect()->route('residuos.index')->with('success', 'Residuo eliminado correctamente.');
    }
}
