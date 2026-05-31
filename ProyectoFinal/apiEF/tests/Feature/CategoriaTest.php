<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Categoria;

class CategoriaTest extends TestCase
{
    use RefreshDatabase;

    // Test para crear una categoría
    public function testInsertCategoria() {
        $user = User::factory()->create([ 'email' => 'short.email@example.com', ]);

        $categoriaData = [
            'descripcion' => 'Descripción de la categoría de prueba',
        ];

        $response = $this->actingAs($user)->postJson('/api/categorias', $categoriaData);

        $response->assertStatus(201)
                ->assertJson([
                    'data' => [
                        'descripcion' => 'Descripción de la categoría de prueba',
                    ]
                ]);

        // Verificar que la categoría se ha insertado en la base de datos
        $this->assertDatabaseHas('categorias', [
            'descripcion' => 'Descripción de la categoría de prueba',
        ]);
    }

    // Test para obtener una categoría
    public function testGetCategoria() {
        $user = User::factory()->create();

        $categoria = new Categoria();
        $categoria->descripcion = "Descripción de la categoría de prueba";
        $categoria->save();

        $response = $this->actingAs($user)->getJson("/api/categorias/{$categoria->id}");

        $response->assertStatus(200)
                ->assertJson([
                    'id' => $categoria->id,
                    'descripcion' => $categoria->descripcion,
                ]);
    }

    // Test para actualizar una categoría
    public function testUpdateCategoria() {
        $user = User::factory()->create();

        $categoria = new Categoria();
        $categoria->descripcion = "Descripción de la categoría de prueba";
        $categoria->save();

        $updatedData = [
            'descripcion' => 'Descripción actualizada de la categoría',
        ];

        $response = $this->actingAs($user)->putJson("/api/categorias/{$categoria->id}", $updatedData);

        $response->assertStatus(200)
                ->assertJson([
                    'data' => [
                        'descripcion' => 'Descripción actualizada de la categoría',
                    ]
                ]);

        $categoria->refresh();

        $this->assertEquals($updatedData['descripcion'], $categoria->descripcion);
    }

    // Test para eliminar una categoría
    public function testDeleteCategoria() {
        $user = User::factory()->create();

        $categoria = new Categoria();
        $categoria->descripcion = "Descripción de la categoría de prueba";
        $categoria->save();

        $response = $this->actingAs($user)->deleteJson("/api/categorias/{$categoria->id}");

        $response->assertStatus(200)
                ->assertJson([
                    'message' => 'Categoría eliminada correctamente'
                ]);

        $this->assertNull(Categoria::find($categoria->id));
    }
}
