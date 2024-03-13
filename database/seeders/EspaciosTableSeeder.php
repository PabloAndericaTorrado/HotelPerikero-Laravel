<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EspaciosTableSeeder extends Seeder
{
    public function run()
    {
        $espacios = [
            [
                'nombre' => 'Salón Imperial',
                'capacidad_maxima' => 100,
                'descripcion' => 'Salón amplio para reserva_eventos grandes, con vista al jardín.',
                'precio' => 200.00,
                'disponible' => true,
            ],
            [
                'nombre' => 'Sala VIP',
                'capacidad_maxima' => 20,
                'descripcion' => 'Espacio exclusivo para reuniones privadas y pequeñas celebraciones.',
                'precio' => 500.00,
                'disponible' => true,
            ],
            [
                'nombre' => 'Auditorio',
                'capacidad_maxima' => 300,
                'descripcion' => 'Espacio equipado para conferencias y reserva_eventos corporativos, con tecnología de punta para presentaciones.',
                'precio' => 300.00,
                'disponible' => true,
            ],
            [
                'nombre' => 'Sala de Exposiciones',
                'capacidad_maxima' => 40,
                'descripcion' => 'Diseñada para exposiciones de arte, ferias de libros y otros reserva_eventos culturales.',
                'precio' => 100.00,
                'disponible' => true,
            ],
            [
                'nombre' => 'Salon para Eventos',
                'capacidad_maxima' => 50,
                'descripcion' => 'El mejor espacio del hotel para celebrar cumpleaños, comuniones y bautizos.',
                'precio' => 120.00,
                'disponible' => true,
            ],
        ];

        DB::table('espacios')->insert($espacios);
    }
}
