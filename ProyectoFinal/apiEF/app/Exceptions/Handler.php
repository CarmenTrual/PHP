<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Auth\AuthenticationException;

class Handler extends ExceptionHandler
{
    // Campos que no se muestran en la vista de errores
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    // // Registrar las funciones de manejo de excepciones para la aplicación.
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    // Manejo de excepciones de usuario no autenticado.
    protected function unauthenticated($request, AuthenticationException $exception) 
    { 
        // Devuelve una respuesta JSON con un mensaje de "No autenticado" y un código de estado 401
        return response()->json(['message' => 'No estás autenticado'], 401);
    }
}
