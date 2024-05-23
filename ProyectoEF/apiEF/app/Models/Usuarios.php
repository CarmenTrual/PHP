<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;
    protected $fillable = ['nombre_usuario', 'contraseña', 'apellidos', 'email'];
    protected $hidden = ['contraseña', 'created_at', 'updated_at'];

    public function pedidos()
    {
        return $this->hasMany(Pedidos::class, 'id_usuario');
    }
}
