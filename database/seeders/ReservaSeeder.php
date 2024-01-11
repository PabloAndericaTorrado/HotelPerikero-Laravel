<?php

namespace Database\Seeders;

use DateInterval;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class ReservaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Obtener IDs de registros existentes en las tablas relacionadas
        $usuarioIds = DB::table('users')->pluck('id')->toArray();
        $habitacionIds = DB::table('habitacions')->pluck('id')->toArray();

        for ($i = 0; $i < 5; $i++) {
            $checkInDate = $faker->dateTimeBetween('-1 month', '+1 month');
            $duration = $faker->numberBetween(1, 14); // Duración de la reserva en días
            $checkOutDate = clone $checkInDate;
            $checkOutDate->add(new DateInterval("P{$duration}D")); // Añadir días a la fecha de inicio

            DB::table('reservas')->insert([
                'users_id' => $faker->randomElement($usuarioIds),
                'habitacion_id' => $faker->randomElement($habitacionIds),
                'check_in' => $checkInDate->format('Y-m-d'),
                'check_out' => $checkOutDate->format('Y-m-d'),
                'precio_total' => $faker->randomFloat(2, 100, 500),
                'pagado' => $faker->boolean,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
