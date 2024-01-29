<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ParkingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear 50 plazas de parking
        for ($i = 1; $i <= 50; $i++) {
            DB::table('parking')->insert([
                'disponible' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

