<?php

namespace App\Http\Controllers;

use App\Models\Recolector;
use App\Models\EmpresaRecolectora;
use App\Models\User;
use Illuminate\Http\Request;

class RecolectorController extends Controller
{
    public function index()
    {
        $recolectores = Recolector::with('empresaRecolectora')->get();
        return view('recolectores.index', compact('recolectores'));
    }

    public function create()
    {
        $empresas = EmpresaRecolectora::all();
        $usuarios = User::all();
        return view('recolectores.create', compact('empresas', 'usuarios'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'empresa_recolectora_id' => 'required|exists:empresa_recolectoras,id',
        'numero_documento' => 'required|string|max:50',
        'telefono' => 'required|string|max:20',
    ]);

    Recolector::create($request->all());

    return redirect()->route('recolectores.index')->with('success', 'Recolector creado correctamente.');
}

    public function show(Recolector $recolector)
    {
        return view('recolectores.show', compact('recolector'));
    }

    public function edit(Recolector $recolector)
    {
        $empresas = EmpresaRecolectora::all();
        $usuarios = User::all();
        return view('recolectores.edit', compact('recolector', 'empresas', 'usuarios'));
    }

    public function update(Request $request, Recolector $recolector)
    {
         $request->validate([
        'nombre' => 'required|string|max:255',
        'empresa_recolectora_id' => 'required|exists:empresa_recolectoras,id',
        'numero_documento' => 'required|string|max:50',
        'telefono' => 'required|string|max:20',
    ]);

        $recolector->update($request->all());

        return redirect()->route('recolectores.index')->with('success', 'Recolector actualizado correctamente.');
    }

    public function destroy(Recolector $recolector)
    {
        $recolector->delete();

        return redirect()->route('recolectores.index')->with('success', 'Recolector eliminado correctamente.');
    }
}