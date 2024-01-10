<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ReservaServiciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Obtener IDs de registros existentes en las tablas relacionadas
        $reservaIds = DB::table('reservas')->pluck('id')->toArray();
        $servicioIds = DB::table('servicios')->pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            DB::table('reserva_servicios')->insert([
                'reserva_id' => $faker->randomElement($reservaIds),
                'servicio_id' => $faker->randomElement($servicioIds),
                'cantidad' => $faker->numberBetween(1, 5),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
