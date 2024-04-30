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
            ['numero_habitacion' => 101, 'tipo' => 'Individual - 101', 'precio' => 80.00, 'descripcion' => 'Habitación individual con vista a la ciudad', 'disponibilidad' => true, 'capacidad' => 1,'caracteristicas' =>'vista_mar,fumadores', 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 102, 'tipo' => 'Doble - 102', 'precio' => 120.00, 'descripcion' => 'Habitación doble con cama matrimonial', 'disponibilidad' => true, 'capacidad' => 2,'caracteristicas' =>'vista_interior,mascotas', 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 103, 'tipo' => 'Suite - 103', 'precio' => 200.00, 'descripcion' => 'Suite de lujo con jacuzzi y vista al mar', 'disponibilidad' => true, 'capacidad' => 2,'caracteristicas' =>'vista_mar,fumadores,balcon_privado', 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 104, 'tipo' => 'Familiar - 104', 'precio' => 150.00, 'descripcion' => 'Habitación familiar con cuatro camas individuales ', 'disponibilidad' => true, 'capacidad' => 4,'caracteristicas' =>'vista_ciudad,mascotas', 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 105, 'tipo' => 'Individual - 105', 'precio' => 85.00, 'descripcion' => 'Habitación individual con balcón', 'disponibilidad' => true, 'capacidad' => 1,'caracteristicas' =>'vista_ciudad,balcon_compartido', 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 106, 'tipo' => 'Doble - 106', 'precio' => 130.00, 'descripcion' => 'Habitación doble con cama king-size', 'disponibilidad' => true, 'capacidad' => 2,'caracteristicas' =>'vista_mar,mascotas', 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 107, 'tipo' => 'Suite - 107', 'precio' => 220.00, 'descripcion' => 'Suite ejecutiva con sala de estar y minibar', 'disponibilidad' => true, 'capacidad' => 2,'caracteristicas' =>'vista_interior,mascotas', 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 108, 'tipo' => 'Familiar - 108', 'precio' => 160.00, 'descripcion' => 'Habitación familiar con dos camas individuales y una de matrimonio', 'disponibilidad' => true, 'capacidad' => 4,'caracteristicas' =>'vista_ciudad,fumadores', 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 109, 'tipo' => 'Individual - 109', 'precio' => 90.00, 'descripcion' => 'Habitación individual con escritorio', 'disponibilidad' => true, 'capacidad' => 1,'caracteristicas' =>'vista_mar,balcon_compartido', 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 110, 'tipo' => 'Doble - 110', 'precio' => 140.00, 'descripcion' => 'Habitación doble con terraza privada', 'disponibilidad' => true, 'capacidad' => 2,'caracteristicas' =>'vista_mar,balcon_privado', 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 111, 'tipo' => 'Individual - 111', 'precio' => 95.00, 'descripcion' => 'Habitación cómoda con vista al mar y balcón privado', 'capacidad' => 1, 'caracteristicas' => 'vista_mar,balcon_privado', 'disponibilidad' => true, 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 112, 'tipo' => 'Doble - 112', 'precio' => 150.00, 'descripcion' => 'Habitación doble permitiendo mascotas y fumadores', 'capacidad' => 2, 'caracteristicas' => 'mascotas,fumadores', 'disponibilidad' => true, 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 113, 'tipo' => 'Suite - 113', 'precio' => 210.00, 'descripcion' => 'Suite con vista interior tranquila y apta para mascotas', 'capacidad' => 2, 'caracteristicas' => 'vista_interior,mascotas', 'disponibilidad' => true, 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 114, 'tipo' => 'Familiar - 114', 'precio' => 180.00, 'descripcion' => 'Amplia habitación familiar con vistas a la ciudad y balcón', 'capacidad' => 4, 'caracteristicas' => 'vista_ciudad,balcon_privado', 'disponibilidad' => true, 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 115, 'tipo' => 'Individual - 115', 'precio' => 70.00, 'descripcion' => 'Pequeña habitación individual para fumadores con vista al mar', 'capacidad' => 1, 'caracteristicas' => 'vista_mar,fumadores', 'disponibilidad' => true, 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 116, 'tipo' => 'Doble - 116', 'precio' => 135.00, 'descripcion' => 'Habitación doble con todas las comodidades, mascotas bienvenidas', 'capacidad' => 2, 'caracteristicas' => 'mascotas,vista_ciudad', 'disponibilidad' => true, 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 117, 'tipo' => 'Suite - 117', 'precio' => 240.00, 'descripcion' => 'Suite de lujo con balcón privado y vista al mar', 'capacidad' => 2, 'caracteristicas' => 'vista_mar,balcon_privado', 'disponibilidad' => true, 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 118, 'tipo' => 'Familiar - 118', 'precio' => 160.00, 'descripcion' => 'Habitación familiar ideal para familias con mascotas', 'capacidad' => 4, 'caracteristicas' => 'mascotas,balcon_privado', 'disponibilidad' => true, 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 119, 'tipo' => 'Individual - 119', 'precio' => 80.00, 'descripcion' => 'Habitación individual básica con vista interior', 'capacidad' => 1, 'caracteristicas' => 'vista_interior', 'disponibilidad' => true, 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 120, 'tipo' => 'Doble - 120', 'precio' => 130.00, 'descripcion' => 'Habitación doble espaciosa con vista a la ciudad', 'capacidad' => 2, 'caracteristicas' => 'vista_ciudad', 'disponibilidad' => true, 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 121, 'tipo' => 'Individual - 121', 'precio' => 85.00, 'descripcion' => 'Habitación individual con vista al mar', 'capacidad' => 1, 'caracteristicas' => 'vista_mar', 'disponibilidad' => true, 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 122, 'tipo' => 'Doble - 122', 'precio' => 140.00, 'descripcion' => 'Habitación doble con balcón privado', 'capacidad' => 2, 'caracteristicas' => 'balcon_privado', 'disponibilidad' => true, 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 123, 'tipo' => 'Suite - 123', 'precio' => 220.00, 'descripcion' => 'Suite de lujo con vista al mar', 'capacidad' => 2, 'caracteristicas' => 'vista_mar', 'disponibilidad' => true, 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 124, 'tipo' => 'Familiar - 124', 'precio' => 180.00, 'descripcion' => 'Habitación familiar con vista a la ciudad', 'capacidad' => 4, 'caracteristicas' => 'vista_ciudad', 'disponibilidad' => true, 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 125, 'tipo' => 'Individual - 125', 'precio' => 90.00, 'descripcion' => 'Habitación individual con vista interior', 'capacidad' => 1, 'caracteristicas' => 'vista_interior', 'disponibilidad' => true, 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 126, 'tipo' => 'Doble - 126', 'precio' => 150.00, 'descripcion' => 'Habitación doble con todas las comodidades', 'capacidad' => 2, 'caracteristicas' => '', 'disponibilidad' => true, 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 127, 'tipo' => 'Suite - 127', 'precio' => 250.00, 'descripcion' => 'Suite de lujo con jacuzzi', 'capacidad' => 2, 'caracteristicas' => '', 'disponibilidad' => true, 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 128, 'tipo' => 'Familiar - 128', 'precio' => 200.00, 'descripcion' => 'Habitación familiar amplia', 'capacidad' => 4, 'caracteristicas' => '', 'disponibilidad' => true, 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 129, 'tipo' => 'Individual - 129', 'precio' => 95.00, 'descripcion' => 'Habitación individual con balcón compartido', 'capacidad' => 1, 'caracteristicas' => 'balcon_compartido', 'disponibilidad' => true, 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 130, 'tipo' => 'Doble - 130', 'precio' => 160.00, 'descripcion' => 'Habitación doble con terraza', 'capacidad' => 2, 'caracteristicas' => '', 'disponibilidad' => true, 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 131, 'tipo' => 'Individual - 131', 'precio' => 100.00, 'descripcion' => 'Habitación individual con vistas espectaculares', 'capacidad' => 1, 'caracteristicas' => '', 'disponibilidad' => true, 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 132, 'tipo' => 'Doble - 132', 'precio' => 170.00, 'descripcion' => 'Habitación doble con todas las comodidades', 'capacidad' => 2, 'caracteristicas' => '', 'disponibilidad' => true, 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 133, 'tipo' => 'Suite - 133', 'precio' => 270.00, 'descripcion' => 'Suite de lujo con vista al mar', 'capacidad' => 2, 'caracteristicas' => 'vista_mar', 'disponibilidad' => true, 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 134, 'tipo' => 'Familiar - 134', 'precio' => 220.00, 'descripcion' => 'Habitación familiar con vista a la ciudad', 'capacidad' => 4, 'caracteristicas' => 'vista_ciudad', 'disponibilidad' => true, 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 135, 'tipo' => 'Individual - 135', 'precio' => 110.00, 'descripcion' => 'Habitación individual con vista interior', 'capacidad' => 1, 'caracteristicas' => 'vista_interior', 'disponibilidad' => true, 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 136, 'tipo' => 'Doble - 136', 'precio' => 180.00, 'descripcion' => 'Habitación doble con todas las comodidades', 'capacidad' => 2, 'caracteristicas' => '', 'disponibilidad' => true, 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 137, 'tipo' => 'Suite - 137', 'precio' => 290.00, 'descripcion' => 'Suite de lujo con jacuzzi', 'capacidad' => 2, 'caracteristicas' => '', 'disponibilidad' => true, 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 138, 'tipo' => 'Familiar - 138', 'precio' => 240.00, 'descripcion' => 'Habitación familiar amplia', 'capacidad' => 4, 'caracteristicas' => '', 'disponibilidad' => true, 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 139, 'tipo' => 'Individual - 139', 'precio' => 120.00, 'descripcion' => 'Habitación individual con balcón compartido', 'capacidad' => 1, 'caracteristicas' => 'balcon_compartido', 'disponibilidad' => true, 'created_at' => now(), 'updated_at' => now()],
            ['numero_habitacion' => 140, 'tipo' => 'Doble - 140', 'precio' => 200.00, 'descripcion' => 'Habitación doble con terraza', 'capacidad' => 2, 'caracteristicas' => '', 'disponibilidad' => true, 'created_at' => now(), 'updated_at' => now()],

        ]);
    }
}
