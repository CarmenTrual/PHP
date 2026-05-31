<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// =========================
// RUTAS DEL CARRITO (SESIONES)
// =========================

// Ver carrito (devuelve el contenido de la sesión)
Route::get('/carrito', function () {
    return session('carrito', []);
});

// Añadir un curso al carrito
Route::post('/carrito/add', function (\Illuminate\Http\Request $request) {
    $carrito = session('carrito', []);

    $carrito[] = [
        'nombre' => $request->nombre,
        'precio' => $request->precio
    ];

    session(['carrito' => $carrito]);

    return ['ok' => true, 'carrito' => $carrito];
});

// Eliminar un curso por índice
Route::post('/carrito/remove', function (\Illuminate\Http\Request $request) {
    $carrito = session('carrito', []);

    if (isset($carrito[$request->index])) {
        unset($carrito[$request->index]);
        $carrito = array_values($carrito); // reindexar
        session(['carrito' => $carrito]);
    }

    return ['ok' => true, 'carrito' => $carrito];
});

