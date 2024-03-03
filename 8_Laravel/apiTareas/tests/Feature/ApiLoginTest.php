<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;


class ApiLoginTest extends TestCase
{
  use RefreshDatabase;

  public function testRegister()
  {
    $user = [
      'name' => 'Test',
      'email' => 'test@test.com',
      'password' => '1234',
    ];

    $response = $this->postJson('api/register', $user);
    $response->assertStatus(200)
        ->assertJsonStructure(['data', 'access_token', 'token_type']);
  }

  public function testLogin()
  {
    $user = User::factory()->create();

    $login = [
      'email' => $user->email,
      'password' => 'password', 
    ];

    $response = $this->postJson('api/login', $login);
    $response->assertStatus(200)
        ->assertJsonStructure(['message', 'access_token', 'token_type']);
  }

  public function testLogout()
  {
    $user = User::factory()->create();
    $token = $user->createToken('auth_token')->plainTextToken;

    $this->actingAs($user)->assertAuthenticated();

    $response = $this->actingAs($user)->withToken($token)->getJson('api/logout');
    $response->assertStatus(200)
        ->assertJson(['message' => 'Sesión cerrada.']);
  }
}
