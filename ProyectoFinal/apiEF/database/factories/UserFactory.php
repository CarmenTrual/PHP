<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{

    protected static ?string $password;

    public function definition(): array
    {
        return [
            'nombre_usuario' => fake()->userName(), 
            'apellidos' => fake()->lastName(),
            'email' => substr(fake()->unique()->safeEmail(), 0, 30), //substr para que el email no sea demasiado largo
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('passwordparatest'),
            'remember_token' => Str::random(10),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
