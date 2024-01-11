<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Insertar usuarios de ejemplo
        DB::table('users')->insert([
            [
                'name' => 'Usuario 1',
                'email' => 'usuario1@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password1'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Usuario 2',
                'email' => 'usuario2@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password2'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Usuario 3',
                'email' => 'usuario3@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password3'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Usuario 4',
                'email' => 'usuario4@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password4'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Usuario 5',
                'email' => 'usuario5@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password3'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Usuario 6',
                'email' => 'usuario6@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password4'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Usuario 7',
                'email' => 'usuario7@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password3'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Usuario 8',
                'email' => 'usuario8@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password4'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Usuario 9',
                'email' => 'usuario9@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password3'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Usuario 10',
                'email' => 'usuario10@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password4'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => now(),
                'password' => Hash::make('admin'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Puedes agregar más usuarios según sea necesario
        ]);
    }
}
