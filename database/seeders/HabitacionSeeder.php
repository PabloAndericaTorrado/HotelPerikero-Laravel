<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HabitacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('habitacions')->insert([
            ['numero_habitacion' => 101, 'tipo' => 'Individual', 'precio' => 80.00, 'descripcion' => 'Habitación individual con vista a la ciudad', 'disponibilidad' => true, 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 102, 'tipo' => 'Doble', 'precio' => 120.00, 'descripcion' => 'Habitación doble con cama matrimonial', 'disponibilidad' => true, 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 103, 'tipo' => 'Suite', 'precio' => 200.00, 'descripcion' => 'Suite de lujo con jacuzzi y vista al mar', 'disponibilidad' => true, 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 104, 'tipo' => 'Familiar', 'precio' => 150.00, 'descripcion' => 'Habitación familiar con cuatro camas individuales ', 'disponibilidad' => true, 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 105, 'tipo' => 'Individual', 'precio' => 85.00, 'descripcion' => 'Habitación individual con balcón', 'disponibilidad' => true, 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 106, 'tipo' => 'Doble', 'precio' => 130.00, 'descripcion' => 'Habitación doble con cama king-size', 'disponibilidad' => true, 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 107, 'tipo' => 'Suite', 'precio' => 220.00, 'descripcion' => 'Suite ejecutiva con sala de estar y minibar', 'disponibilidad' => true, 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 108, 'tipo' => 'Familiar', 'precio' => 160.00, 'descripcion' => 'Habitación familiar con dos camas individuales y una de matrimonio', 'disponibilidad' => true, 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 109, 'tipo' => 'Individual', 'precio' => 90.00, 'descripcion' => 'Habitación individual con escritorio', 'disponibilidad' => true, 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 110, 'tipo' => 'Doble', 'precio' => 140.00, 'descripcion' => 'Habitación doble con terraza privada', 'disponibilidad' => true, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
