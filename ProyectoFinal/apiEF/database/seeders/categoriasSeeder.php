<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class categoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            ['descripcion' => 'Cante'],
            ['descripcion' => 'Baile'],
            ['descripcion' => 'Guitarra']
        ]);
    }
}
