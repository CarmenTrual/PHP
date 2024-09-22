<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class nivelesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('niveles')->insert([
            ['nivel' => 'Principiante'],
            ['nivel' => 'Intermedio'],
            ['nivel' => 'Avanzado'],
        ]);
    }
}
