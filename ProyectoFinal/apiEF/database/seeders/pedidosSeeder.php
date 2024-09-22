<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class pedidosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pedidos')->insert([
            'id_usuario' => 1,
            'id_curso' => 1,
            'cantidad' => 1,
            'estado' => 'Pendiente',
            'fecha' => now(),
        ]);
    }
}
