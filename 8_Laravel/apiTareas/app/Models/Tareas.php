<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tareas extends Model
{
  use HasFactory;
  protected $fillable = ["titulo", "descripcion"];
  protected $hidden = ["created_at", "updated_at"];
  public function etiquetas(): BelongsToMany
  {
    return $this->belongsToMany(
      Etiquetas::class,
      'tareas_etiquetas',
      'tareas_id',
      'etiquetas_id'
    );
  }
}

