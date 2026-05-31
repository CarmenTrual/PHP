<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class NiveleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('niveles')->insert([
            ['nivel' => 'Principiante', 'created_at' => now(), 'updated_at' => now()],
            ['nivel' => 'Intermedio', 'created_at' => now(), 'updated_at' => now()],
            ['nivel' => 'Avanzado', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

