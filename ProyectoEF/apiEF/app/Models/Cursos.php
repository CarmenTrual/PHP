<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    use HasFactory;
    protected $fillable = ['id_categoria', 'id_nivel', 'nombre_curso', 'descripcion', 'precio'];
    protected $hidden = ['created_at', 'updated_at'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function nivel()
    {
        return $this->belongsTo(Niveles::class, 'id_nivel');
    }

    public function pedidos()
    {
        return $this->hasMany(Pedidos::class, 'id_curso');
    }
}
