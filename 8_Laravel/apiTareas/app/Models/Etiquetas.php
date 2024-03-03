<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Etiquetas extends Model
{
  use HasFactory;
  protected $fillable = ["nombre"];
  protected $hidden = ["created_at", "updated_at"];
}

