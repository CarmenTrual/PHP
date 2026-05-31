<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    // Test para crear un usuario
    public function testInserUser() {
        $userData = [
            'nombre_usuario' => 'nuevo_usuario',
            'apellidos' => 'nuevo_apellido',
            'email' => 'nuevoemail@test.com',
            'password' => 'passwordparatest',
            'password_confirmation' => 'passwordparatest',
        ];

        $response = $this->postJson('/api/register', $userData);

        $response->assertStatus(201)
                ->assertJson([
                    'user' => [
                        'nombre_usuario' => 'nuevo_usuario',
                        'apellidos' => 'nuevo_apellido',
                        'email' => 'nuevoemail@test.com',
                    ]
                ]);
    }

    // Test para obtener un usuario
    public function testGetUser() {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->getJson("/api/user/profile");

        $response->assertStatus(200)
                ->assertJson([
                    'user' => [
                        'nombre_usuario' => $user->nombre_usuario,
                        'apellidos' => $user->apellidos,
                        'email' => $user->email,
                    ]
                ]);
    }

    // Test para actualizar un usuario
    public function testUpdateUser() {
        $user = User::factory()->create();
        $updatedData = [
            'nombre_usuario' => 'actualizado_usuario',
            'apellidos' => 'actualizado_apellido',
            'email' => 'actualizadoemail@test.com'
        ];

        $response = $this->actingAs($user)->putJson("/api/user/update", $updatedData);

        $response->assertStatus(200)
                ->assertJson([
                    'user' => $updatedData
                ]);
    }

    // Test para eliminar un usuario
    public function testDeleteUser() {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->deleteJson("/api/user/delete");

        $response->assertStatus(200)
                ->assertJson([
                    'message' => 'Usuario eliminado correctamente'
                ]);
    }
}
