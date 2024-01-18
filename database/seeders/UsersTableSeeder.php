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
            ],
            [
                'name' => 'Alice',
                'apellidos' => 'Johnson',
                'email' => 'alice.johnson@example.com',
                'password' => Hash::make('password3'),
                'telefono' => '5551234567',
                'direccion' => '789 Pine Street',
                'país' => 'United States',
                'ciudad' => 'Dallas',
                'codigo_postal' => '75001',
            ],
            [
                'name' => 'Bob',
                'apellidos' => 'Williams',
                'email' => 'bob.williams@example.com',
                'password' => Hash::make('password4'),
                'telefono' => '3339876543',
                'direccion' => '101 Maple Avenue',
                'país' => 'United States',
                'ciudad' => 'Miami',
                'codigo_postal' => '33123',
            ],
            [
                'name' => 'Eva',
                'apellidos' => 'Davis',
                'email' => 'eva.davis@example.com',
                'password' => Hash::make('password5'),
                'telefono' => '8885551234',
                'direccion' => '246 Birch Lane',
                'país' => 'United States',
                'ciudad' => 'Alvurkerke',
                'codigo_postal' => '60601',
            ],
            [
                'name' => 'Pablo',
                'apellidos' => 'Andérica Torrado',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin'),
                'telefono' => '628657710',
                'direccion' => 'C/ Vak Chivato',
                'país' => 'ESPAÑA',
                'ciudad' => 'Badajoz',
                'codigo_postal' => '06011',
            ],
        ];
        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }
    }
}
