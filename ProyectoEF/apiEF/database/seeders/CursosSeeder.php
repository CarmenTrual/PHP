<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\support\Facades\DB;
use Illuminate\Database\Seeder;

class CursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cursos')->insert([
            [
                'id_categoria' => 1,
                'id_nivel' => 1,
                'nombre_curso' => 'Introducción a la Soleá',
                'descripcion' => 'Aprende los fundamentos del cante por soleá.',
                'precio' => 49.99,
            ],
            [
                'id_categoria' => 2,
                'id_nivel' => 2,
                'nombre_curso' => 'Bulerías - Intermedio',
                'descripcion' => 'Mejora tus habilidades de baile con este curso de bulerías.',
                'precio' => 59.99,
            ],
        ]);
    }
}
