<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResiduoController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\RecolectorSolicitudController;
use App\Http\Controllers\EmpresaRecolectoraController;
use App\Http\Controllers\RecolectorController;
use App\Http\Controllers\ReporteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User CRUD routes
    Route::resource('users', \App\Http\Controllers\UserController::class);
});

require __DIR__ . '/auth.php';

Route::resource('residuos', ResiduoController::class)->middleware('auth');

Route::resource('solicitudes', SolicitudController::class)->parameters([
    'solicitudes' => 'solicitud'
]);

Route::resource('empresaRecolectora', EmpresaRecolectoraController::class)->middleware('auth');

Route::resource('recolectores', RecolectorController::class)->middleware('auth')->parameters([
    'recolectores' => 'recolector'
]);

Route::middleware('auth')->group(function () {
    Route::get('/reportes/usuario', [ReporteController::class, 'reportePorUsuario'])->name('reportes.usuario');
});

Route::get('/reportes/general', [ReporteController::class, 'reporteGeneral'])->name('reportes.general');
Route::get('/reportes/empresa', [ReporteController::class, 'reportePorEmpresa'])->name('reportes.empresa');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/recolectorSolicitud', [RecolectorSolicitudController::class, 'index'])
        ->name('recolectorSolicitud.index');

    Route::post('/recolectorSolicitud/{id}/completar', [RecolectorSolicitudController::class, 'completar'])
        ->name('recolectorSolicitud.completar');

    Route::post('/recolectorSolicitud/{id}/cancelar', [RecolectorSolicitudController::class, 'cancelar'])
        ->name('recolectorSolicitud.cancelar');
});

Route::get('/reporte-usuario/pdf', [ReporteController::class, 'reporteUsuarioPDF'])
     ->name('reporte.usuario.pdf');
Route::get('/reportes/usuario/seleccionar', function() {
    return view('reportes.seleccionar_usuario'); // tu blade
})->name('reporte.seleccionar_usuario');
Route::get('/reportes/usuario/pdf', [ReporteController::class, 'reporteUsuarioPDF'])
    ->name('reportes.usuario.pdf');