<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservasEventosTableSeeder extends Seeder
{
    public function run()
    {
        $reservasEventos = [
            [
                'users_id' => 1, // Asegúrate de que este ID exista en tu tabla de usuarios
                'espacio_id' => 1, // Asegúrate de que este ID exista en tu tabla de espacios
                "check_in" => "2023-03-20",
                "check_out" => "2023-03-25",
                'precio_total' => 2000,
                'pagado' => true,
            ],
        ];

        DB::table('reservas_eventos')->insert($reservasEventos);
    }
}
