<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'nombre_usuario' => 'UsuarioPrueba',
            'contraseña' => Hash::make('contraseña'),
            'apellidos' => 'Apeliidos',
            'email' => 'usuario@prueba.com',
        ]);
    }
}
