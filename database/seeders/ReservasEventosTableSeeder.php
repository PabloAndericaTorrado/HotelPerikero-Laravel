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
                'users_id' => 5,
                'espacio_id' => 1,
                "check_in" => "2023-03-20",
                "check_out" => "2023-03-25",
                "cantidad_personas" => 75,
                'precio_total' => 2000,
                'pagado' => true,
            ],
        ];

        DB::table('reservas_eventos')->insert($reservasEventos);
    }
}
