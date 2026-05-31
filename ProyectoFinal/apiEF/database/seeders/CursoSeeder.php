<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
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
                'nombre_curso' => 'Bulerías',
                'descripcion' => 'Aprende el cante por bulerías',
                'precio' => 69.99,
                'created_at' => now(), 
                'updated_at' => now(),
            ],
            [
                'id_categoria' => 2,
                'id_nivel' => 2,
                'nombre_curso' => 'Soleá',
                'descripcion' => 'Aprende a bailar por soleá',
                'precio' => 79.99,
                'created_at' => now(), 
                'updated_at' => now(),
            ]
        ]);
    }
}

