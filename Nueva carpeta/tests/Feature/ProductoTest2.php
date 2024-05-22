<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Producto;

class ProductoTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function get_productos()
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
