<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Residuo;

class ResiduoSeeder extends Seeder
{
    public function run()
    {
        $residuos = [
            // Orgánicos
            ['nombre' => 'Restos de comida', 'categoria' => 'Residuo Orgánico', 'descripcion' => 'Residuos alimenticios biodegradables.'],
            ['nombre' => 'Cáscaras de frutas', 'categoria' => 'Residuo Orgánico', 'descripcion' => 'Desechos orgánicos comunes.'],

            // Inorgánicos
            ['nombre' => 'Botellas plásticas', 'categoria' => 'Residuo Inorgánico', 'descripcion' => 'Envases de plástico reciclables.'],
            ['nombre' => 'Vidrio roto', 'categoria' => 'Residuo Inorgánico', 'descripcion' => 'Fragmentos de vidrio reciclables.'],

            // Peligrosos
            ['nombre' => 'Pilas usadas', 'categoria' => 'Residuo Peligroso', 'descripcion' => 'Contienen químicos contaminantes.'],
            ['nombre' => 'Aceite de motor usado', 'categoria' => 'Residuo Peligroso', 'descripcion' => 'Altamente contaminante, requiere manejo especial.'],
        ];


        foreach ($residuos as $residuo) {
            Residuo::create($residuo);
        }
    }
}