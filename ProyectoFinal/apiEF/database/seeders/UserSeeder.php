<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'nombre_usuario' => 'UsuarioPrueba',
            'password' => Hash::make('password'),
            'apellidos' => 'Apeliidos',
            'email' => 'usuario@prueba.com',
            'created_at' => now(),
            'updated_at' => now()
        ],
            [
                'nombre_usuario' => 'UsuarioPrueba2',
            'password' => Hash::make('password'),
            'apellidos' => 'Apeliidos2',
            'email' => 'usuario@prueba2.com',
            'created_at' => now(),
            'updated_at' => now()
            ]
        ]);

        $users = User::all();
        foreach ($users as $user) {
            $user->createToken('API Token')->plainTextToken;
        }
    }
}
