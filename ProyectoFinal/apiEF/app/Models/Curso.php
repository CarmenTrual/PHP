<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = ['id_categoria', 'id_nivel', 'nombre_curso', 'descripcion', 'precio'];
    protected $hidden = ['created_at', 'updated_at'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_catergoria');
    }

    public function nivel()
    {
        return $this->belongsTo(Nivel::class, 'id_nivel');
    }

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'id_curso');
    }
}
