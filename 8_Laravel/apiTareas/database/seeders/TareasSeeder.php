<?php

namespace Database\Seeders;

use Illuminate\support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TareasSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('tareas')->insert([
      'titulo' => 'Supermercado',
      'descripcion' => 'Pan, leche, huevos',
    ]);
    DB::table('tareas')->insert([
      'titulo' => 'Limpiar',
      'descripcion' => 'Jaula de pájaros',
    ]);
    DB::table('tareas')->insert([
      'titulo' => 'Amazon',
      'descripcion' => 'Recoger paquete',
    ]);
  }
}
