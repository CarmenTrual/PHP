<?php

namespace Database\Seeders;

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
            'nombre'=>'Ropa'
        ]);
        DB::table('categorias')->insert([
            'nombre'=>'Otros'
        ]);
    }
}
