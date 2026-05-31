<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            ['descripcion' => 'Cante', 'created_at' => now(), 'updated_at' => now(),],
            ['descripcion' => 'Baile', 'created_at' => now(), 'updated_at' => now(),],
            ['descripcion' => 'Guitarra', 'created_at' => now(), 'updated_at' => now(),]
        ]);
    }
}
