<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Crear un usuario administrador
        DB::table('usuarios')->insert([
            'nombre' => 'Admin',
            'email' => 'admin@example.com',
            'contraseña' => bcrypt('admin'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Crear usuarios faker
        for ($i = 0; $i < 9; $i++) {
            DB::table('usuarios')->insert([
                'nombre' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'contraseña' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
