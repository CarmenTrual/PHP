<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\support\Facades\DB;
use Illuminate\Database\Seeder;


class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categoria')->insert([
            ['descripcion' => 'Cante'],
            ['descripcion' => 'Baile'],
            ['descripcion' => 'Guitarra'],
        ]);
    }
}
