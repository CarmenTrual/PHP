<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\support\Facades\DB;
use Illuminate\Database\Seeder;


class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuarios')->insert([
            'nombre_usuario' => 'UsuarioPrueba',
            'contraseña' => 'contraseña',
            'apellidos' => 'Apellidos',
            'email' => 'usuario@prueba.com',
        ]);
    }
}
