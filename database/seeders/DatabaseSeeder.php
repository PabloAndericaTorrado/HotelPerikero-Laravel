<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersTableSeeder::class,
            ServiciosSeeder::class,
            HabitacionSeeder::class,
            ReservaSeeder::class,
            ReservaServiciosSeeder::class,
            ParkingSeeder::class,
            ReseniasSeeder::class,
            EspaciosTableSeeder::class,
            ReservasEventosTableSeeder::class,
            ServiciosEventosTableSeeder::class,
        ]);

    }
}
