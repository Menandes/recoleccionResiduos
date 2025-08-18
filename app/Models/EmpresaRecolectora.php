<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpresaRecolectora extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
    ];

    /**
     * Relación: Una empresa recolectora tiene muchas recolecciones.
     */
    public function recolecciones()
    {
        return $this->hasMany(Recoleccion::class);
    }

    /**
     * Relación: Una empresa recolectora tiene muchos recolectores (usuarios con rol 'recolector').
     */
    public function recolectores()
    {
        return $this->hasMany(User::class, 'empresa_recolectora_id');
    }
}
