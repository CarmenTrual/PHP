<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase; 

    // Test para el registro
    public function testRegister(){
        // Datos de ejemplo
        $response = $this->postJson('/api/register', 
        [ 
            'nombre_usuario' => 'testusuario', 
            'apellidos' => 'testapellidos', 
            'email' => 'testemail@test.com', 
            'password' => 'passwordparatest', 
            'password_confirmation' => 'passwordparatest', 
        ]);

        // Verifica que la respuesta da el estado 201 (Creado) 
        $response->assertStatus(201); 
        
        // Verifica que la respuesta sea en JSON 
        $response->assertJsonStructure(
            [ 
                'token', 
                'user' => [ 'id', 'nombre_usuario', 'apellidos', 'email', 'created_at', 'updated_at' ] 
            ]); 
        }

    // Test para el inicio de sesión
    public function testLogin()
    {
        // Crea un usuario de prueba 
        $user = User::factory()->create(
            [ 
                'nombre_usuario' => 'testusuario', 
                'apellidos' => 'testapellidos',
                'email' => 'testemail@test.com', 
                'password' => Hash::make('passwordparatest') ]
            ); 
            
        // Datos de ejemplo 
        $response = $this->postJson('/api/login', 
        [ 
            'email' => 'testemail@test.com', 
            'password' => 'passwordparatest', 
        ]); 

        // Verifica que la respuesta da el estado 200 (OK) 
        $response->assertStatus(200); 

        // Verifica que la respuesta sea en JSON  
        $response->assertJsonStructure(
            [ 
                'message', 
                'access_token', 
                'token_type' 
            ]); 
        }

    // Test para el cierre de sesión
    public function testLogout()
    {
        // Crea un usuario de prueba 
        $user = User::factory()->create(
            [ 
                'nombre_usuario' => 'testusuario', 
                'apellidos' => 'testapellidos', 
                'email' => 'testemail@test.com', 
                'password' => Hash::make('passwordparatest') 
            ]);
        
        // Genera un token para el usuario 
        $token = $user->createToken('auth_token')->plainTextToken; 
        
        // Hace la solicitud de logout con el token 
        $response = $this->withHeaders(
            [ 
                'Authorization' => 'Bearer ' . $token, ])->postJson('/api/logout'); 
                
        // Verifica que la respuesta da el estado 200 (OK) 
        $response->assertStatus(200); 
        
        // Verifica que la respuesta da el mensaje 
        $response->assertJson(
            [ 
                'message' => 'Sesión cerrada correctamente' 
            ]); 
        } 
    }
    