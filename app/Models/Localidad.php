<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    use HasFactory;

    protected $table = 'localidades';

    protected $fillable = [
        'nombre',
    ];

    /**
     * Relación: una localidad tiene muchos usuarios.
     */
    public function usuarios()
    {
        return $this->hasMany(User::class);
    }
}
