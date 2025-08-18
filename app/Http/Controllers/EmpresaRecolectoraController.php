<?php

namespace App\Http\Controllers;

use App\Models\EmpresaRecolectora;
use Illuminate\Http\Request;

class EmpresaRecolectoraController extends Controller
{
    public function index()
    {
        $empresas = EmpresaRecolectora::all();
        return view('empresaRecolectora.index', compact('empresas'));
    }

    public function create()
    {
        return view('empresaRecolectora.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
        ]);

        EmpresaRecolectora::create($request->all());

        return redirect()->route('empresaRecolectora.index')->with('success', 'Empresa creada correctamente.');
    }

    public function show(EmpresaRecolectora $empresaRecolectora)
    {
        return view('empresaRecolectora.show', compact('empresaRecolectora'));
    }

    public function edit(EmpresaRecolectora $empresaRecolectora)
    {
        return view('empresaRecolectora.edit', compact('empresaRecolectora'));
    }

    public function update(Request $request, EmpresaRecolectora $empresaRecolectora)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
        ]);

        $empresaRecolectora->update($request->all());

        return redirect()->route('empresaRecolectora.index')->with('success', 'Empresa actualizada correctamente.');
    }

    public function destroy(EmpresaRecolectora $empresaRecolectora)
    {
        $empresaRecolectora->delete();

        return redirect()->route('empresaRecolectora.index')->with('success', 'Empresa eliminada correctamente.');
    }
}