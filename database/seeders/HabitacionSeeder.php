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
            ['numero_habitacion' => 101, 'tipo' => 'Individual', 'precio' => 80.00, 'descripcion' => 'Habitación individual con vista a la ciudad', 'disponibilidad' => true, 'capacidad' => 1,'caracteristicas' =>'vista_mar,fumadores', 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 102, 'tipo' => 'Doble', 'precio' => 120.00, 'descripcion' => 'Habitación doble con cama matrimonial', 'disponibilidad' => true, 'capacidad' => 2,'caracteristicas' =>'vista_interior,mascotas', 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 103, 'tipo' => 'Suite', 'precio' => 200.00, 'descripcion' => 'Suite de lujo con jacuzzi y vista al mar', 'disponibilidad' => true, 'capacidad' => 2,'caracteristicas' =>'vista_mar,fumadores,balcon_privado', 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 104, 'tipo' => 'Familiar', 'precio' => 150.00, 'descripcion' => 'Habitación familiar con cuatro camas individuales ', 'disponibilidad' => true, 'capacidad' => 4,'caracteristicas' =>'vista_ciudad,mascotas', 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 105, 'tipo' => 'Individual', 'precio' => 85.00, 'descripcion' => 'Habitación individual con balcón', 'disponibilidad' => true, 'capacidad' => 1,'caracteristicas' =>'vista_ciudad,balcon_compartido', 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 106, 'tipo' => 'Doble', 'precio' => 130.00, 'descripcion' => 'Habitación doble con cama king-size', 'disponibilidad' => true, 'capacidad' => 2,'caracteristicas' =>'vista_mar,mascotas', 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 107, 'tipo' => 'Suite', 'precio' => 220.00, 'descripcion' => 'Suite ejecutiva con sala de estar y minibar', 'disponibilidad' => true, 'capacidad' => 2,'caracteristicas' =>'vista_interior,mascotas', 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 108, 'tipo' => 'Familiar', 'precio' => 160.00, 'descripcion' => 'Habitación familiar con dos camas individuales y una de matrimonio', 'disponibilidad' => true, 'capacidad' => 4,'caracteristicas' =>'vista_ciudad,fumadores', 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 109, 'tipo' => 'Individual', 'precio' => 90.00, 'descripcion' => 'Habitación individual con escritorio', 'disponibilidad' => true, 'capacidad' => 1,'caracteristicas' =>'vista_mar,balcon_compartido', 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 110, 'tipo' => 'Doble', 'precio' => 140.00, 'descripcion' => 'Habitación doble con terraza privada', 'disponibilidad' => true, 'capacidad' => 2,'caracteristicas' =>'vista_mar,balcon_privado', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
