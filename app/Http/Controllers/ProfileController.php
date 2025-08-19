<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Solicitud;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();

        // Historial SOLO del usuario autenticado
        $solicitudes = Solicitud::with('residuo')
            ->where('user_id', $user->id)
            ->latest() // por created_at; usa ->orderByDesc('fecha_recoleccion') si prefieres por fecha
            ->get();

        return view('profile.index', compact('user', 'solicitudes'));
    }

    public function edit(Request $request): View
    {
        $localidades = \App\Models\Localidad::all(); // todas las localidades
        return view('profile.edit', [
            'user' => $request->user(),
            'localidades' => $localidades,
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {

        $user = $request->user();
        $user->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // actualizar localidad
        if ($request->has('localidad_id')) {
            $user->localidad_id = $request->localidad_id;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();
        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
