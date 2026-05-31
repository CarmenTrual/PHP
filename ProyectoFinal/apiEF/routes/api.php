<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

//Rutas para autenticación
Route::post('/register', [AuthController::class, 'register']); 
Route::post('/login', [AuthController::class, 'login']); 

//Rutas sin autenticación
Route::get('/users', [UserController::class, 'index']); 
Route::get('/categorias', [CategoriaController::class, 'index']); 
Route::get('/cursos', [CursoController::class, 'index']);  
Route::get('/niveles', [NivelController::class, 'index']); 

// Obtener una categoría, curso o nivel por ID
Route::get('/categorias/{categoria}', [CategoriaController::class, 'show']);
Route::get('/cursos/{curso}', [CursoController::class, 'show']);
Route::get('/niveles/{nivel}', [NivelController::class, 'show']);

//Rutas protegidas con autenticación
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user(); // Muestra datos del usuario autenticado  
    });

    //Pedidos: Solo accesibles para usuarios autenticados
    Route::apiResource('pedidos', PedidoController::class); // Cada usuario solo podrá ver sus propios pedidos  

    // Solo se pueden ver los usuarios sin login, pero para crear, editar o borrar hay que estar autenticado.
    Route::apiResource('users', UserController::class)->except(['index']);  

    //Gestión del perfil del usuario autenticado
    Route::get('/user/profile', [UserController::class, 'perfilUsuario']); // Ver perfil del usuario logueado  
    Route::put('/user/update', [UserController::class, 'perfilUpdate']); // Editar perfil  
    Route::delete('/user/delete', [UserController::class, 'perfilDelete']); // Eliminar cuenta  

    //Solo usuarios autenticados pueden crear categorías, niveles y cursos
    Route::post('/categorias', [CategoriaController::class, 'store']); 
    Route::post('/niveles', [NivelController::class, 'store']); 
    Route::post('/cursos', [CursoController::class, 'store']); 

    //Solo usuarios autenticados pueden editar categorías, niveles y cursos
    Route::put('/categorias/{categoria}', [CategoriaController::class, 'update']); 
    Route::put('/niveles/{nivel}', [NivelController::class, 'update']); 
    Route::put('/cursos/{curso}', [CursoController::class, 'update']); 

     //Solo usuarios autenticados pueden eliminar categorías, niveles y cursos
    Route::delete('/categorias/{categoria}', [CategoriaController::class, 'destroy']); 
    Route::delete('/niveles/{nivel}', [NivelController::class, 'destroy']); 
    Route::delete('/cursos/{curso}', [CursoController::class, 'destroy']);

    //Cerrar sesión
    Route::post('/logout', [AuthController::class, 'logout']); // Logout solo para usuarios autenticados  
});

