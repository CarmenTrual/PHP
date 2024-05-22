<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\support\Facades\DB;
use Illuminate\Database\Seeder;

class NivelesSeeder extends Seeder
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
