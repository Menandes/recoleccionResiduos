<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear usuarios de ejemplo con puntos mayores a 100
        User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password'),
            'rol_id' => 1, // admin
            'localidad_id' => 1, // Suba
            'puntos' => 150, // puntos iniciales
        ]);

        User::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'password' => Hash::make('password'),
            'rol_id' => 2, // usuario normal
            'localidad_id' => 2, // Engativá
            'puntos' => 200, // puntos iniciales
        ]);

        User::create([
            'name' => 'Bob Johnson',
            'email' => 'bob@example.com',
            'password' => Hash::make('password'),
            'rol_id' => 3, // recolector
            'localidad_id' => 3, // Chapinero
            'puntos' => 250, // puntos iniciales
        ]);
    }
}
