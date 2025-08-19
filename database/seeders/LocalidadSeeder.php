<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Localidad;

class LocalidadSeeder extends Seeder
{
    public function run(): void
    {
        $localidades = ['Suba', 'Engativá', 'Chapinero', 'Usaquén', 'Kennedy'];
        foreach ($localidades as $loc) {
            Localidad::firstOrCreate(['nombre' => $loc]);
        }
    }
}
