<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EmpresaRecolectora;

class EmpresaRecolectoraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $empresas = [
            [
                'nombre' => 'EcoRecolectores S.A.',
                'direccion' => 'Calle 123 #45-67, Bogotá',
                'telefono' => '3101234567',
            ],
            [
                'nombre' => 'GreenWaste Ltda.',
                'direccion' => 'Carrera 10 #20-30, Medellín',
                'telefono' => '3209876543',
            ],
            [
                'nombre' => 'Recolección Sustentable',
                'direccion' => 'Av. Principal 50, Cali',
                'telefono' => '3155555555',
            ],
        ];

        foreach ($empresas as $empresa) {
            EmpresaRecolectora::create($empresa);
        }
    }
}
