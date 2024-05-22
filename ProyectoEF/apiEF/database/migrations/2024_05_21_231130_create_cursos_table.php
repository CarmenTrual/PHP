<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id('id_curso');
            $table->foreignId('id_categoria')->constrained('categoria', 'id_categoria');
            $table->foreignId('id_nivel')->constrained('niveles', 'id_nivel');
            $table->string('nombre_curso', 30);
            $table->text('descripcion');
            $table->decimal('precio', 10,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
