<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rol;

class RolSeeder extends Seeder
{
    public function run(): void
    {
        Rol::firstOrCreate(['nombre' => 'admin']);
        Rol::firstOrCreate(['nombre' => 'usuario']);
        Rol::firstOrCreate(['nombre' => 'recolector']);
    }
}
