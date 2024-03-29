<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('productos')->insert([
      'nombre' =>'pantalon',
      'descripcion' =>'pantalon corto algodón',
    ]);
    DB::table('productos')->insert([
      'nombre' =>'falda',
      'descripcion' =>'falda larga cuero',
    ]);
    DB::table('productos')->insert([
      'nombre' =>'vestido',
      'descripcion' =>'vestido de lino',
    ]);
  }
}