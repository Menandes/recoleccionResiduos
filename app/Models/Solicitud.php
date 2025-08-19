<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Solicitud extends Model
{
    use HasFactory;

    protected $table = 'solicitudes';

    protected $fillable = [
    'user_id',
    'residuo_id',
    'fecha_recoleccion',
    'tipo_residuo',
    'peso',
    'descripcion',
    'estado'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function residuo()
    {
        return $this->belongsTo(Residuo::class);
    }

    public function empresaRecolectora()
    {
        return $this->belongsTo(EmpresaRecolectora::class, 'empresa_recolectora_id');
    }

}

