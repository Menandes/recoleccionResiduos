<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rol;
use App\Models\Localidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['rol', 'localidad'])->paginate(10);
        return view('users.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:150|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'localidad_id' => 'required|exists:localidades,id'
        ]);

        // Buscar rol por defecto
        $rolCliente = Rol::where('nombre', 'usuario')->first();

        // Crear usuario
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->localidad_id = $request->localidad_id;
        $user->rol_id = $rolCliente ? $rolCliente->id : null; // asigna rol cliente
        $user->save();

        return redirect()->route('users.index')->with('success', 'Usuario registrado correctamente.');
    }

    public function show(string $id)
    {
        $user = User::with(['rol', 'localidad'])->findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $roles = Rol::all();
        $localidades = Localidad::all();
        return view('users.edit', compact('user', 'roles', 'localidades'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|string|min:8|confirmed',
            'rol_id' => 'required|exists:roles,id',
            'localidad_id' => 'nullable|exists:localidades,id',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'puntos' => $request->puntos ?? 0,
            'rol_id' => $request->rol_id,
            'localidad_id' => $request->localidad_id,
        ];


        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente!');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente!');
    }
}
