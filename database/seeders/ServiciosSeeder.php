<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ServiciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $servicios = [
            ['nombre' => 'Wi-Fi', 'precio' => 10.00],
            ['nombre' => 'Desayuno buffet', 'precio' => 15.00],
            ['nombre' => 'Limpieza diaria', 'precio' => 20.00],
            ['nombre' => 'Servicio de habitaciones 24/7', 'precio' => 25.00],
            ['nombre' => 'Piscina climatizada', 'precio' => 30.00],
            ['nombre' => 'Gimnasio con entrenador personal', 'precio' => 35.00],
            ['nombre' => 'Estacionamiento privado', 'precio' => 15.00],
            ['nombre' => 'Transporte al aeropuerto', 'precio' => 40.00],
            ['nombre' => 'Spa y masajes', 'precio' => 50.00],
            ['nombre' => 'Excursiones guiadas locales', 'precio' => 30.00],
        ];

        foreach ($servicios as $servicio) {
            DB::table('servicios')->insert([
                'nombre' => $servicio['nombre'],
                'precio' => $servicio['precio'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
