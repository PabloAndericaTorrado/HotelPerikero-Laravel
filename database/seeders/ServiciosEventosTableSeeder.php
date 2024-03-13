<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiciosEventosTableSeeder extends Seeder
{
    public function run()
    {
        $serviciosEventos = [
            [
                'nombre' => 'Catering Básico',
                'precio' => 15.00,
                'descripcion' => 'Incluye menú de tres platos con bebida.',
            ],
            [
                'nombre' => 'Catering Avanzado',
                'precio' => 50.00,
                'descripcion' => 'Incluye menú degustación con bebida.',
            ],
            [
                'nombre' => 'Barra Libre',
                'precio' => 100.00,
                'descripcion' => 'Acceso ilimitado a bebidas seleccionadas durante el evento.',
            ],
            [
                'nombre' => 'DJ Profesional',
                'precio' => 300.00,
                'descripcion' => 'Música personalizada para tu evento con un DJ profesional.',
            ],
            [
                'nombre' => 'Decoración Temática',
                'precio' => 200.00,
                'descripcion' => 'Personalización del espacio con decoración acorde a la temática de tu evento.',
            ],
            [
                'nombre' => 'Fotografía y Video',
                'precio' => 500.00,
                'descripcion' => 'Servicio completo de fotografía y video para capturar los mejores momentos.',
            ],
            [
                'nombre' => 'Animación y Espectáculos',
                'precio' => 400.00,
                'descripcion' => 'Espectáculos de animación para entretener a los invitados, incluyendo magos, payasos, y más.',
            ],
        ];

        DB::table('servicio_eventos')->insert($serviciosEventos);
    }
}
