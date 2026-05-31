<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Curso;
use App\Models\Categoria;
use App\Models\Nivel;

class CursoTest extends TestCase
{
    use RefreshDatabase;

    // Test para crear un curso
    public function testInsertCurso() {
        $user = User::factory()->create();

        $categoria = new Categoria();
        $categoria->descripcion = "Descripción de la categoría de prueba";
        $categoria->save();

        $nivel = new Nivel();
        $nivel->nivel = "Nivel de prueba";
        $nivel->save();

        $cursoData = [
            'id_categoria' => $categoria->id,
            'id_nivel' => $nivel->id,
            'nombre_curso' => 'Nombre del curso de prueba',
            'descripcion' => 'Descripción del curso de prueba',
            'precio' => 100.00,
        ];

        $response = $this->actingAs($user)->postJson('/api/cursos', $cursoData);

        $response->assertStatus(201)
                ->assertJson([
                    'data' => [
                        'categoria' => [
                            'id' => $categoria->id,
                            'descripcion' => $categoria->descripcion,
                        ],
                        'nivel' => [
                            'id' => $nivel->id,
                            'nivel' => $nivel->nivel,
                        ],
                        'nombre_curso' => 'Nombre del curso de prueba',
                        'descripcion' => 'Descripción del curso de prueba',
                        'precio' => 100.00,
                    ]
                ]);

        // Verificar que el curso se ha insertado en la base de datos
        $this->assertDatabaseHas('cursos', [
            'id_categoria' => $categoria->id,
            'id_nivel' => $nivel->id,
            'nombre_curso' => 'Nombre del curso de prueba',
            'descripcion' => 'Descripción del curso de prueba',
            'precio' => 100.00,
        ]);
    }

    // Test para obtener un curso
    public function testGetCurso() {
        $user = User::factory()->create();

        $categoria = new Categoria();
        $categoria->descripcion = "Descripción de la categoría de prueba";
        $categoria->save();

        $nivel = new Nivel();
        $nivel->nivel = "Nivel de prueba";
        $nivel->save();

        $curso = new Curso();
        $curso->id_categoria = $categoria->id;
        $curso->id_nivel = $nivel->id;
        $curso->nombre_curso = 'Nombre del curso de prueba';
        $curso->descripcion = 'Descripción del curso de prueba';
        $curso->precio = 100.00;
        $curso->save();

        $response = $this->actingAs($user)->getJson("/api/cursos/{$curso->id}");

        $response->assertStatus(200)
                ->assertJson([
                    'id' => $curso->id,
                    'categoria' => [
                        'id' => $categoria->id,
                        'descripcion' => $categoria->descripcion,
                    ],
                    'nivel' => [
                        'id' => $nivel->id,
                        'nivel' => $nivel->nivel,
                    ],
                    'nombre_curso' => $curso->nombre_curso,
                    'descripcion' => $curso->descripcion,
                    'precio' => 100.00,
                ]);
    }

    // Test para actualizar un curso
    public function testUpdateCurso() {
        $user = User::factory()->create();

        $categoria = new Categoria();
        $categoria->descripcion = "Descripción de la categoría de prueba";
        $categoria->save();

        $nivel = new Nivel();
        $nivel->nivel = "Nivel de prueba";
        $nivel->save();

        $curso = new Curso();
        $curso->id_categoria = $categoria->id;
        $curso->id_nivel = $nivel->id;
        $curso->nombre_curso = 'Nombre del curso de prueba';
        $curso->descripcion = 'Descripción del curso de prueba';
        $curso->precio = 100.00;
        $curso->save();

        $updatedData = [
            'id_categoria' => $curso->id_categoria,
            'id_nivel' => $curso->id_nivel,
            'nombre_curso' => 'Nombre del curso actualizado',
            'descripcion' => 'Descripción del curso actualizado',
            'precio' => 150.00,
        ];

        $response = $this->actingAs($user)->putJson("/api/cursos/{$curso->id}", $updatedData);

        $response->assertStatus(200)
                ->assertJson([
                    'data' => [
                        'categoria' => [
                            'id' => $categoria->id,
                            'descripcion' => $categoria->descripcion,
                        ],
                        'nivel' => [
                            'id' => $nivel->id,
                            'nivel' => $nivel->nivel,
                        ],
                        'nombre_curso' => 'Nombre del curso actualizado',
                        'descripcion' => 'Descripción del curso actualizado',
                        'precio' => 150.00,
                    ]
                ]);

        $curso->refresh();

        $this->assertEquals($updatedData['nombre_curso'], $curso->nombre_curso);
        $this->assertEquals($updatedData['descripcion'], $curso->descripcion);
        $this->assertEquals($updatedData['precio'], $curso->precio);
    }

    // Test para eliminar un curso
    public function testDeleteCurso() {
        $user = User::factory()->create();

        $categoria = new Categoria();
        $categoria->descripcion = "Descripción de la categoría de prueba";
        $categoria->save();

        $nivel = new Nivel();
        $nivel->nivel = "Nivel de prueba";
        $nivel->save();

        $curso = new Curso();
        $curso->id_categoria = $categoria->id;
        $curso->id_nivel = $nivel->id;
        $curso->nombre_curso = 'Nombre del curso de prueba';
        $curso->descripcion = 'Descripción del curso de prueba';
        $curso->precio = 100.00;
        $curso->save();

        $response = $this->actingAs($user)->deleteJson("/api/cursos/{$curso->id}");

        $response->assertStatus(200)
                ->assertJson([
                    'message' => 'Curso eliminado correctamente'
                ]);

        $this->assertNull(Curso::find($curso->id));
    }
}
