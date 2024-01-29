<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'name' => 'John',
                'apellidos' => 'Doe',
                'email' => 'john.doe@example.com',
                'password' => Hash::make('password1'),
                'telefono' => '1234567890',
                'direccion' => '123 Main Street',
                'país' => 'United States',
                'ciudad' => 'San Francisco',
                'codigo_postal' => '90210',
                'rol' => 'user',
            ],
            [
                'name' => 'Jane',
                'apellidos' => 'Smith',
                'email' => 'jane.smith@example.com',
                'password' => Hash::make('password2'),
                'telefono' => '9876543210',
                'direccion' => '456 Oak Avenue',
                'país' => 'United States',
                'ciudad' => 'New York',
                'codigo_postal' => '10001',
                'rol' => 'user',
            ],
            // Otros usuarios...
            [
                'name' => 'Admin',
                'apellidos' => 'Trabajador',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin'),
                'telefono' => '628657710',
                'direccion' => 'C/ Vak Chivato',
                'país' => 'ESPAÑA',
                'ciudad' => 'Badajoz',
                'codigo_postal' => '06011',
                'rol' => 'admin',
            ],
        ];
        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }
    }
}
