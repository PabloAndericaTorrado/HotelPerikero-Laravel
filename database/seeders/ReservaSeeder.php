<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservaSeeder extends Seeder
{
    public function run()
    {
        // Detalles específicos de las 3 reservas a crear
        $reservas = [
            [
                "users_id" => 1, // Asegúrate de que este ID de usuario exista en tu tabla de usuarios
                "habitacion_id" => 1, // Asegúrate de que este ID de habitación exista en tu tabla de habitaciones
                "check_in" => "2023-03-10",
                "check_out" => "2023-03-15",
                "precio_total" => 300.00,
                "pagado" => true,
            ],
            [
                "users_id" => 2, // Asegúrate de que este ID de usuario exista
                "habitacion_id" => 2, // Asegúrate de que este ID de habitación exista
                "check_in" => "2023-03-20",
                "check_out" => "2023-03-25",
                "precio_total" => 350.00,
                "pagado" => false,
            ],
            [
                "users_id" => 5, // Asegúrate de que este ID de usuario exista
                "habitacion_id" => 3, // Asegúrate de que este ID de habitación exista
                "check_in" => "2023-04-01",
                "check_out" => "2023-04-05",
                "precio_total" => 400.00,
                "pagado" => true,
            ],
            [
                "users_id" => 5, // Asegúrate de que este ID de usuario exista
                "habitacion_id" => 10, // Asegúrate de que este ID de habitación exista
                "check_in" => "2023-03-01",
                "check_out" => "2023-03-05",
                "precio_total" => 400.00,
                "pagado" => true,
            ],
        ];

        foreach ($reservas as $reserva) {
            DB::table('reservas')->insert([
                'users_id' => $reserva['users_id'],
                'habitacion_id' => $reserva['habitacion_id'],
                'check_in' => $reserva['check_in'],
                'check_out' => $reserva['check_out'],
                'precio_total' => $reserva['precio_total'],
                'pagado' => $reserva['pagado'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
