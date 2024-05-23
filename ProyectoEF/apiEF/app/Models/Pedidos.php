<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    use HasFactory;
    protected $fillable = ['id_usuario', 'id_curso', 'cantidad', 'estado', 'fecha'];
    protected $hidden = ['created_at', 'updated_at'];

    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'id_usuario');
    }

    public function curso()
    {
        return $this->belongsTo(Cursos::class, 'id_curso');
    }
}
