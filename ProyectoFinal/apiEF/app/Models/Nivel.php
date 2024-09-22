<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    use HasFactory;

    protected $fillable = ['nivel'];
    protected $hidden = ['created_at', 'updated_at'];

    public function cursos(){
        return $this->hasMany(Curso::class, 'id_nivel');
    }
}
