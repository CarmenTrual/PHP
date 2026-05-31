<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = ['nombre_usuario', 'password', 'apellidos','email'];

    protected $hidden = ['password','remember_token', 'created_at', 'updated_at'];

    protected $casts = ['email_verified_at' => 'datetime','password' => 'hashed',];

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'id_usuario');
    }
}
