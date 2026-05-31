<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Nivel;

class NivelTest extends TestCase
{
    use RefreshDatabase;

    // Test para crear un nivel
    public function testInsertNivel () {
        $user = User::factory()->create();

        $nivelData = [
            'nivel' => 'Nivel de prueba',
        ];

        $response = $this->actingAs($user)->postJson('/api/niveles', $nivelData);

        $response->assertStatus(201)
                ->assertJson([
                    'data' => [
                        'nivel' => 'Nivel de prueba',
                    ]
                ]);

        // Verificar que el nivel se ha insertado en la base de datos
        $this->assertDatabaseHas('niveles', [
            'nivel' => 'Nivel de prueba',
        ]);
    }

    // Test para obtener un nivel
    public function testGetNivel() {
        $user = User::factory()->create();

        $nivel = new Nivel();
        $nivel->nivel = "Nivel de prueba";
        $nivel->save();

        $response = $this->actingAs($user)->getJson("/api/niveles/{$nivel->id}");

        $response->assertStatus(200)
                ->assertJson([
                    'id' => $nivel->id,
                    'nivel' => $nivel->nivel,
                ]);
    }

    // Test para actualizar un nivel
    public function testUpdateNivel() {
        $user = User::factory()->create();

        $nivel = new Nivel();
        $nivel->nivel = "Nivel de prueba";
        $nivel->save();

        $updatedData = [
            'nivel' => 'Nivel actualizado',
        ];

        $response = $this->actingAs($user)->putJson("/api/niveles/{$nivel->id}", $updatedData);

        $response->assertStatus(200)
                ->assertJson([
                    'data' => [
                        'nivel' => 'Nivel actualizado',
                    ]
                ]);

        $nivel->refresh();

        $this->assertEquals($updatedData['nivel'], $nivel->nivel);
    }

    // Test para eliminar un nivel
    public function testDeleteNivel() {
        $user = User::factory()->create();

        $nivel = new Nivel();
        $nivel->nivel = "Nivel de prueba";
        $nivel->save();

        $response = $this->actingAs($user)->deleteJson("/api/niveles/{$nivel->id}");

        $response->assertStatus(200)
                ->assertJson([
                    'message' => 'Nivel eliminado correctamente'
                ]);

        $this->assertNull(Nivel::find($nivel->id));
    }
}
