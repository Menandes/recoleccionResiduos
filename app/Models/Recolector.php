<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recolector extends Model
{
    use HasFactory;

    protected $table = 'recolectores';

    protected $fillable = [
        'nombre',
        'empresa_recolectora_id',
        'numero_documento',
        'telefono',
    ];

    public function empresaRecolectora()
    {
        return $this->belongsTo(EmpresaRecolectora::class, 'empresa_recolectora_id');
    }

    public function recolecciones()
    {
        return $this->hasMany(Recoleccion::class);
    }
}