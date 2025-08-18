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
        'rol_id',
        'localidad_id',
        'puntos', // Nuevo campo de puntos
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

    /**
     * Un usuario tiene un rol (admin, recolector, usuario).
     */
    public function rol()
    {
        return $this->belongsTo(Rol::class);
    }

    /**
     * Un usuario pertenece a una localidad.
     */
    public function localidad()
    {
        return $this->belongsTo(Localidad::class);
    }

    /**
     * Un usuario puede hacer muchas solicitudes de recolección.
     */
    public function solicitudes()
    {
        return $this->hasMany(SolicitudRecoleccion::class);
    }

    /**
     * Un usuario (cliente) puede ver sus recolecciones a través de solicitudes.
     */
    public function recolecciones()
    {
        return $this->hasManyThrough(Recoleccion::class, SolicitudRecoleccion::class);
    }
}
