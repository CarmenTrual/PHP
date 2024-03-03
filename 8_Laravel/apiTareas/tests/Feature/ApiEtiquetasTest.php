<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Etiquetas;
use App\Models\User;

class ApiEtiquetasTest extends TestCase
{
  use RefreshDatabase;
  public function testGetEtiquetas()
  {
    $user = User::factory()->create();

    $etiquetas = new Etiquetas();
    $etiquetas->nombre = "Test";
    $etiquetas->save();

    $response = $this->actingAs($user)->withSession(['banned' => false])->getJson('api/etiquetas');
    $response->assertStatus(200);

    $response->assertJsonFragment([
      'id' => $etiquetas->id,
      'nombre' => $etiquetas->nombre,
    ]);
  }

  public function testUpdateEtiquetas()
  {
    $user = User::factory()->create();

    $etiquetas = new Etiquetas();
    $etiquetas->nombre = "Test";
    $etiquetas->save();

    $updatedData = [
      'nombre' => 'Test2',
    ];

    $response = $this->actingAs($user)->withSession(['banned' => false])->putJson("api/etiquetas/{$etiquetas->id}", $updatedData);
    $response->assertStatus(200);

    $etiquetas->refresh();

    $this->assertEquals($updatedData['nombre'], $etiquetas->nombre);
  }
  public function testDeleteEtiquetas()
  {   
    $user = User::factory()->create();

    $etiquetas = new Etiquetas();
    $etiquetas->nombre = "Test3";
    $etiquetas->save();

    $response = $this->actingAs($user)->withSession(['banned' => false])->deleteJson("api/etiquetas/{$etiquetas->id}");
    $response->assertStatus(200);

    $this->assertNull(Etiquetas::find($etiquetas->id));
  }

  public function testInsertEtiquetas()
  {
    $user = User::factory()->create();

    $etiquetaNueva = [
      'nombre' => 'Test4',

    ];

    $response = $this->actingAs($user)->withSession(['banned' => false])->postJson('api/etiquetas', $etiquetaNueva);
    $response->assertStatus(201); 

    $this->assertDatabaseHas('etiquetas', [
      'nombre' => $etiquetaNueva['nombre'],
    ]);
  }
}
