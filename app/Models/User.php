<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'puntos',
        'rol_id',        // 👈 Agregado
        'localidad_id',  // 👈 Agregado
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // 🔗 Relaciones
    public function localidad()
{
    return $this->belongsTo(Localidad::class, 'localidad_id');
}

    /**
     * Un usuario tiene un rol (admin, recolector, usuario).
     */
    public function rol()
    {
        return $this->belongsTo(Rol::class);
    }

    public function getPuntosAttribute($value)
    {
        return $value ?? 0;
    }

    public function agregarPuntos(int $cantidad)
    {
        $this->increment('puntos', $cantidad);
    }


   
  
    /**
     * Un usuario puede hacer muchas solicitudes de recolección.
     */
    public function solicitudes()
    {
        return $this->hasMany(Solicitud::class, 'user_id');
    }

    /**
     * Si quieres acceder directamente a las recolecciones (opcional).
     */
    // public function recolecciones()
    // {
    //     return $this->hasMany(Solicitud::class, 'user_id');
    // }
}
