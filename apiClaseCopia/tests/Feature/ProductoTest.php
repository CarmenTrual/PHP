<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Producto;

class ProductoTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_get_productos()
    {
       // $user = User::factory()->create();

        $producto = new Producto();
        $producto->nombre = "testTitulo";
        $producto->descripcion = "testDescripcion";
        $producto->save();

        $response = $this->getJson('api/productos');
        $response->assertStatus(200);

        $response->assertJsonFragment([
            'id' => $producto->id,
            'nombre' => 'Nombre: '. $producto->nombre,
            'descripcion' => 'Desc: '. $producto->descripcion,
            'meloinvento' => 'loquesea ',
            'categorias' => $producto->categorias
        ]);
    }
}
