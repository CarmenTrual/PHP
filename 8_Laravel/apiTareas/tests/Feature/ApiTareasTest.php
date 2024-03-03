<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Tareas;
use App\Models\User;

class ApiTareasTest extends TestCase
{
  use RefreshDatabase;
  public function testGetTareas()
  {
    $user = User::factory()->create();

    $tareas = new Tareas();
    $tareas->titulo = "Test";
    $tareas->descripcion = "Test_Test_Test";
    $tareas->save();

    $response = $this->actingAs($user)->withSession(['banned' => false])->getJson('api/tareas');
    $response->assertStatus(200);

    $response->assertJsonFragment([
      'id' => $tareas->id,
      'titulo' => $tareas->titulo,
      'descripcion' => $tareas->descripcion,
      'etiquetas' => $tareas->etiquetas!=null ? $tareas->etiquetas->pluck('nombre'):[]
    ]);
  }

  public function testUpdateTareas()
  {

    $user = User::factory()->create();

    $tareas = new Tareas();
    $tareas->titulo = "Test";
    $tareas->descripcion = "Test_Test_Test";
    $tareas->save();

    $updatedData = [
      'titulo' => 'Test2',
      'descripcion' => 'Test2_Test2_Test2',
    ];

    $response = $this->actingAs($user)->withSession(['banned' => false])->putJson("api/tareas/{$tareas->id}", $updatedData);
    $response->assertStatus(200);

    $tareas->refresh();

    $this->assertEquals($updatedData['titulo'], $tareas->titulo);
    $this->assertEquals($updatedData['descripcion'], $tareas->descripcion);
  }
  public function testDeleteTareas()
  {   
    $user = User::factory()->create();

    $tareas = new Tareas();
    $tareas->titulo = "Test3";
    $tareas->descripcion = "Test3_Test3_Test3";
    $tareas->save();

    $response = $this->actingAs($user)->withSession(['banned' => false])->deleteJson("api/tareas/{$tareas->id}");
    $response->assertStatus(200);

    $this->assertNull(Tareas::find($tareas->id));
  }

  public function testInsertTareas()
  {
    $user = User::factory()->create();

    $tareaNueva = [
      'titulo' => 'Test4',
      'descripcion' => 'Test4_Test4_Test4',
    ];

    $response = $this->actingAs($user)->withSession(['banned' => false])->postJson('api/tareas', $tareaNueva);
    $response->assertStatus(201);

    $this->assertDatabaseHas('tareas', [
      'titulo' => $tareaNueva['titulo'],
      'descripcion' => $tareaNueva['descripcion'],
    ]);
  }
}
