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
        $this->call(UsuarioSeeder::class);
        $this->call(ServiciosSeeder::class);
        $this->call(HabitacionSeeder::class);
        $this->call(ReservaSeeder::class);
        $this->call(ReservaServiciosSeeder::class);
    }
}
