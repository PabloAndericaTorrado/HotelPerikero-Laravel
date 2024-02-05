<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ServiciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $servicios = [
            ['nombre' => 'Wi-Fi', 'precio' => 10.00, 'descripcion' => 'Experimenta una conexión de alta velocidad con nuestro servicio Wi-Fi, perfecto para trabajar, navegar y transmitir sin interrupciones.'],
            ['nombre' => 'Desayuno buffet', 'precio' => 15.00, 'descripcion' => 'Comienza tus mañanas con nuestro delicioso desayuno buffet. Disfruta de una amplia variedad de opciones frescas y sabrosas, desde platos calientes hasta opciones más ligeras.'],
            ['nombre' => 'Limpieza diaria', 'precio' => 20.00, 'descripcion' => 'Relájate y disfruta de tu estancia mientras nuestro servicio de limpieza profesional se encarga de mantener tu habitación impecable. '],
            ['nombre' => 'Servicio de habitaciones 24/7', 'precio' => 25.00, 'descripcion' => 'Ofrecemos servicio de habitaciones las 24 horas, para que puedas disfrutar de comodidad y conveniencia en cualquier momento del día.'],
            ['nombre' => 'Piscina climatizada', 'precio' => 30.00, 'descripcion' => 'Sumérgete en la relajación con nuestra piscina climatizada.'],
            ['nombre' => 'Gimnasio con entrenador personal', 'precio' => 35.00, 'descripcion' => 'Mantén tu rutina de ejercicios durante tu estancia con acceso a nuestro gimnasio completamente equipado y entrenador personal.'],
            ['nombre' => 'Estacionamiento privado', 'precio' => 15.00, 'descripcion' => 'Ofrecemos estacionamiento privado y seguro para tu comodidad durante toda tu estancia.'],
            ['nombre' => 'Transporte al aeropuerto', 'precio' => 40.00, 'descripcion' => 'Haz que tu llegada y salida sean sin complicaciones con nuestro servicio de transporte al aeropuerto.'],
            ['nombre' => 'Spa y masajes', 'precio' => 50.00, 'descripcion' => 'Sumérgete en la indulgencia con nuestros servicios de spa y masajes. Relaja cuerpo y mente con tratamientos rejuvenecedores y masajes terapéuticos.'],
            ['nombre' => 'Excursiones guiadas locales', 'precio' => 30.00, 'descripcion' => 'Explora la belleza local con nuestras emocionantes excursiones guiadas.'],
        ];

        foreach ($servicios as $servicio) {
            DB::table('servicios')->insert([
                'nombre' => $servicio['nombre'],
                'precio' => $servicio['precio'],
                'descripcion' => $servicio['descripcion'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
