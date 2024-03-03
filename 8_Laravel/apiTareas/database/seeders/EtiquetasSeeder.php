<?php

namespace Database\Seeders;

use Illuminate\support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EtiquetasSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('etiquetas')->insert([
      'nombre' => 'Compras',
    ]);
    DB::table('etiquetas')->insert([
      'nombre' => 'Hogar',
    ]);
    DB::table('etiquetas')->insert([
      'nombre' => 'Paquetería',
    ]);
  }
}
