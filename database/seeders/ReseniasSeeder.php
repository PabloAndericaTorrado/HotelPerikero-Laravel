<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReseniasSeeder extends Seeder
{
    public function run()
    {
        $resenias = [
            [
                "usuario_id" => 1, // ID del usuario para la reserva 1
                "reserva_id" => 1, // Asegurarse de que este ID exista en la tabla reservas
                "calificacion" => 5,
                "comentario" => "Excelente experiencia, muy recomendado.",
            ],
            [
                "usuario_id" => 2, // ID del usuario para la reserva 2
                "reserva_id" => 2, // Asegurarse de que este ID exista en la tabla reservas
                "calificacion" => 4,
                "comentario" => "Buena ubicación, pero la comida podría mejorar.",
            ],
            [
                "usuario_id" => 5, // ID del usuario para la reserva 3
                "reserva_id" => 3, // Asegurarse de que este ID exista en la tabla reservas
                "calificacion" => 1,
                "comentario" => "Experiencia inolvidable, de lo mala que ha sido, devolverme el dinero ladrones se donde vivis.",
            ],
        ];

        foreach ($resenias as $resenia) {
            DB::table('resenias')->insert([
                'usuario_id' => $resenia['usuario_id'],
                'reserva_id' => $resenia['reserva_id'],
                'calificacion' => $resenia['calificacion'],
                'comentario' => $resenia['comentario'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
