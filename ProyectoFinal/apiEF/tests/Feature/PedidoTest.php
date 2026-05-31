<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Pedido;
use App\Models\Curso;
use App\Models\Nivel;
use App\Models\Categoria;

class PedidoTest extends TestCase
{
    use RefreshDatabase;

    // Test para crear un pedido
    public function testInsertPedidos() {
        $user = User::factory()->create();

        $nivel = new Nivel();
        $nivel->nivel = "Nivel de prueba";
        $nivel->save();

        $categoria = new Categoria();
        $categoria->descripcion = "Descripción de la categoría de prueba";
        $categoria->save();

        $curso = new Curso();
        $curso->id_nivel = $nivel->id;
        $curso->id_categoria = $categoria->id;
        $curso->nombre_curso = "Curso de prueba";
        $curso->descripcion = "Descripción de curso de prueba";
        $curso->precio = 50.00;
        $curso->save();

        $pedidoData = [
            'id_usuario' => $user->id,
            'id_curso' => $curso->id,
            'cantidad' => 2,
            'estado' => 'Pendiente',
            'fecha' => '2024-11-12',
        ];

        $response = $this->actingAs($user)->postJson('/api/pedidos', $pedidoData);

        $response->assertStatus(201)
                ->assertJson([
                    'data' => [
                        'id' => 1,
                        'usuario' => [
                            'id' => $user->id,
                            'nombre_usuario' => $user->nombre_usuario,
                            'apellidos' => $user->apellidos,
                            'email' => $user->email,
                            'cursos_pedidos' => [
                                'Curso de prueba'
                            ],
                            'created_at' => $user->created_at->format('Y-m-d H:i:s'),
                            'updated_at' => $user->updated_at->format('Y-m-d H:i:s'),
                        ],
                        'curso' => [
                            'id' => $curso->id,
                            'categoria' => [
                                'id' => $categoria->id,
                                'descripcion' => $categoria->descripcion,
                                'created_at' => $categoria->created_at->format('Y-m-d H:i:s'),
                                'updated_at' => $categoria->updated_at->format('Y-m-d H:i:s'),
                            ],
                            'nivel' => [
                                'id' => $nivel->id,
                                'nivel' => $nivel->nivel,
                                'created_at' => $nivel->created_at->format('Y-m-d H:i:s'),
                                'updated_at' => $nivel->updated_at->format('Y-m-d H:i:s')
                            ],
                            'nombre_curso' => $curso->nombre_curso,
                            'descripcion' => $curso->descripcion,
                            'precio' => number_format($curso->precio, 2, '.', ''),
                            'created_at' => $curso->created_at->format('Y-m-d H:i:s'),
                            'updated_at' => $curso->updated_at->format('Y-m-d H:i:s'),
                        ],
                        'cantidad' => 2,
                        'estado' => 'Pendiente',
                        'fecha' => '2024-11-12',
                         'created_at' => $response['data']['created_at'], // Align with response JSON
                         'updated_at' => $response['data']['updated_at'], // Align with response JSON
                    ]
                ]);

        // Verificar que el pedido se ha insertado en la base de datos
        $this->assertDatabaseHas('pedidos', [
            'id_usuario' => $user->id,
            'id_curso' => $curso->id,
            'cantidad' => 2,
            'estado' => 'Pendiente',
            'fecha' => '2024-11-12',
        ]);
    }

    // Test para obtener un pedido
    public function testGetPedidos() {
        $user = User::factory()->create();

        $nivel = new Nivel();
        $nivel->nivel = "Nivel de prueba";
        $nivel->save();

        $categoria = new Categoria();
        $categoria->descripcion = "Descripción de la categoría de prueba";
        $categoria->save();

        $curso = new Curso();
        $curso->id_nivel = $nivel->id;
        $curso->id_categoria = $categoria->id;
        $curso->nombre_curso = "Curso de prueba";
        $curso->descripcion = "Descripción de curso de prueba";
        $curso->precio = 50.00;
        $curso->save();

        $pedido = new Pedido();
        $pedido->id_usuario = $user->id;
        $pedido->id_curso = $curso->id;
        $pedido->cantidad = 2;
        $pedido->estado = 'Pendiente';
        $pedido->fecha = '2024-11-12';
        $pedido->save();

        $response = $this->actingAs($user)->getJson("/api/pedidos/{$pedido->id}");

        $response->assertStatus(200)
                ->assertJson([
                    'id' => $pedido->id,
                    'usuario' => [
                        'id' => $user->id,
                        'nombre_usuario' => $user->nombre_usuario,
                        'apellidos' => $user->apellidos,
                        'email' => $user->email,
                        'cursos_pedidos' => [
                            'Curso de prueba'
                        ],
                        'created_at' => $user->created_at->format('Y-m-d H:i:s'),
                        'updated_at' => $user->updated_at->format('Y-m-d H:i:s'),
                    ],
                    'curso' => [
                        'id' => $curso->id,
                        'categoria' => [
                            'id' => $categoria->id,
                            'descripcion' => $categoria->descripcion,
                            'created_at' => $categoria->created_at->format('Y-m-d H:i:s'),
                            'updated_at' => $categoria->updated_at->format('Y-m-d H:i:s'),
                        ],
                        'nivel' => [
                            'id' => $nivel->id,
                            'nivel' => $nivel->nivel,
                            'created_at' => $nivel->created_at->format('Y-m-d H:i:s'),
                            'updated_at' => $nivel->updated_at->format('Y-m-d H:i:s'),
                        ],
                        'nombre_curso' => $curso->nombre_curso,
                        'descripcion' => $curso->descripcion,
                        'precio' => number_format($curso->precio, 2, '.', ''),
                        'created_at' => $curso->created_at->format('Y-m-d H:i:s'),
                        'updated_at' => $curso->updated_at->format('Y-m-d H:i:s'),
                    ],
                    'cantidad' => $pedido->cantidad,
                    'estado' => $pedido->estado,
                    'fecha' => $pedido->fecha,
                     'created_at' => $response['created_at'], // Align with response JSON
                     'updated_at' => $response['updated_at'], // Align with response JSON
                ]);
    }

    // Test para actualizar un pedido
    public function testUpdatePedidos() {
        $user = User::factory()->create();

        $nivel = new Nivel();
        $nivel->nivel = "Nivel de prueba";
        $nivel->save();

        $categoria = new Categoria();
        $categoria->descripcion = "Descripción de la categoría de prueba";
        $categoria->save();

        $curso = new Curso();
        $curso->id_nivel = $nivel->id;
        $curso->id_categoria = $categoria->id;
        $curso->nombre_curso = "Curso de prueba";
        $curso->descripcion = "Descripción de curso de prueba";
        $curso->precio = 50.00;
        $curso->save();

        $pedido = new Pedido();
        $pedido->id_usuario = $user->id;
        $pedido->id_curso = $curso->id;
        $pedido->cantidad = 2;
        $pedido->estado = 'Pendiente';
        $pedido->fecha = '2024-11-12';
        $pedido->save();

        $updatedData = [
            'id_usuario' => $pedido->id_usuario,
            'id_curso' => $pedido->id_curso,
            'cantidad' => 3,
            'estado' => 'Completado',
            'fecha' => '2024-11-13',
        ];

        $response = $this->actingAs($user)->putJson("/api/pedidos/{$pedido->id}", $updatedData);

        $response->assertStatus(200)
                ->assertJson([
                    'data' => [
                        'id' => $pedido->id,
                        'usuario' => [
                            'id' => $user->id,
                            'nombre_usuario' => $user->nombre_usuario,
                            'apellidos' => $user->apellidos,
                            'email' => $user->email,
                            'cursos_pedidos' => [
                                'Curso de prueba'
                            ],
                            'created_at' => $user->created_at->format('Y-m-d H:i:s'),
                            'updated_at' => $user->updated_at->format('Y-m-d H:i:s'),
                        ],
                        'curso' => [
                            'id' => $curso->id,
                            'categoria' => [
                                'id' => $categoria->id,
                                'descripcion' => $categoria->descripcion,
                                'created_at' => $categoria->created_at->format('Y-m-d H:i:s'),
                                'updated_at' => $categoria->updated_at->format('Y-m-d H:i:s'),
                            ],
                            'nivel' => [
                                'id' => $nivel->id,
                                'nivel' => $nivel->nivel,
                                'created_at' => $nivel->created_at->format('Y-m-d H:i:s'),
                                'updated_at' => $nivel->updated_at->format('Y-m-d H:i:s'),
                            ],
                            'nombre_curso' => $curso->nombre_curso,
                            'descripcion' => $curso->descripcion,
                            'precio' => number_format($curso->precio, 2, '.', ''),
                            'created_at' => $curso->created_at->format('Y-m-d H:i:s'),
                            'updated_at' => $curso->updated_at->format('Y-m-d H:i:s'),
                        ],
                        'cantidad' => $updatedData['cantidad'],
                        'estado' => $updatedData['estado'],
                        'fecha' => $updatedData['fecha'],
                        'created_at' => $response['data']['created_at'], 
                        'updated_at' => $response['data']['updated_at'], 
                        ]]);
                        
                        $pedido->refresh();
    
                        $this->assertEquals($updatedData['cantidad'], $pedido->cantidad);
                        $this->assertEquals($updatedData['estado'], $pedido->estado);
                        $this->assertEquals($updatedData['fecha'], $pedido->fecha);
                    }
    
    // Test para eliminar un pedido
    public function testDeletePedidos() {
        $user = User::factory()->create();
        
        $nivel = new Nivel();
        $nivel->nivel = "Nivel de prueba";
        $nivel->save();
        
        $categoria = new Categoria();
        $categoria->descripcion = "Descripción de la categoría de prueba";
        $categoria->save();
        
        $curso = new Curso();
        $curso->id_nivel = $nivel->id;
        $curso->id_categoria = $categoria->id;
        $curso->nombre_curso = "Curso de prueba";
        $curso->descripcion = "Descripción de curso de prueba";
        $curso->precio = 50.00;
        $curso->save();

        $pedido = new Pedido();
        $pedido->id_usuario = $user->id;
        $pedido->id_curso = $curso->id;
        $pedido->cantidad = 2;
        $pedido->estado = 'Pendiente';
        $pedido->fecha = '2024-11-12';
        $pedido->save();

        $response = $this->actingAs($user)->deleteJson("/api/pedidos/{$pedido->id}");

        $response->assertStatus(200)
                ->assertJson([
                    'message' => 'Pedido eliminado correctamente'
                ]);

        $this->assertNull(Pedido::find($pedido->id));
    }
}
